<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonQuixoteText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonQuixoteTextController extends Controller
{
    private const DEFAULT_CHARACTERS = 500;
    private const DEFAULT_WORDS = 100;
    private const DEFAULT_SENTENCES = 5;

    /**
     * Generate ipsum text.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type (characters, words, sentences)
     * @param  int  $amount
     * @return \Illuminate\Http\JsonResponse
     */
    private function generateIpsumText(Request $request, string $type, int $amount)
    {
        $startingText = DonQuixoteText::inRandomOrder()->first();

        switch ($type) {
            case 'characters':
                $texts = DonQuixoteText::where('id', '>=', $startingText->id)
                    ->take(ceil($amount / $startingText->text_length) + 1)
                    ->get();
                $text = Str::limit(implode(' ', $texts->pluck('text')->toArray()), $amount);
                break;
            case 'words':
                $texts = DonQuixoteText::where('id', '>=', $startingText->id)
                    ->take(ceil($amount / $startingText->word_count) + 1)
                    ->get();
                $text = implode(' ', explode(' ', implode(' ', $texts->pluck('text')->toArray()), $amount + 1));
                break;
            case 'sentences':
                $texts = DonQuixoteText::where('id', '>=', $startingText->id)
                    ->take($amount)
                    ->get();
                $text = implode(' ', $texts->pluck('text')->toArray());
                break;
            default:
                abort(400, 'Invalid type');
        }

        return response()->json(['ipsum_text' => $text]);
    }

    /**
     * Generate ipsum text by characters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateByCharacters(Request $request)
    {
        $characters = $request->query('characters', self::DEFAULT_CHARACTERS);

        return $this->generateIpsumText($request, 'characters', $characters);
    }

    /**
     * Generate ipsum text by words.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateByWords(Request $request)
    {
        $words = $request->query('words', self::DEFAULT_WORDS);

        return $this->generateIpsumText($request, 'words', $words);
    }

    /**
     * Generate ipsum text by sentences.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateBySentences(Request $request)
    {
        $sentences = $request->query('sentences', self::DEFAULT_SENTENCES);

        return $this->generateIpsumText($request, 'sentences', $sentences);
    }
}
