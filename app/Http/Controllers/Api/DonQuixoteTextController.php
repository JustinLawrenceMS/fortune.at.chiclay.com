<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonQuixoteText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Quixotify\Controller as Con;
use Quixotify\Generator;

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
        $generator = new Generator(new Con(new \PDO('sqlite:database.db')));

        $text = $generator->generate($type, $amount);

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
