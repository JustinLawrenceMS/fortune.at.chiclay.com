<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonQuixoteText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DonQuixoteTextController extends Controller
{
    /**
     * Generate ipsum text by characters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateByCharacters(Request $request)
    {
        $characters = $request->query('characters', 500);

        $startingText = DonQuixoteText::inRandomOrder()->first();
        $texts = DonQuixoteText::where('id', '>=', $startingText->id)
        ->take(ceil($characters / $startingText->text_length) + 1)
        ->get();

        $fullText = implode(' ', $texts->pluck('text')->toArray());
        $trimmedText = Str::limit($fullText, $characters);

        return response()->json(['ipsum_text' => $trimmedText]);
    }

    /**
     * Generate ipsum text by words.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateByWords(Request $request)
    {
        $words = $request->query('words', 100);

        $startingText = DonQuixoteText::inRandomOrder()->first();
        $texts = DonQuixoteText::where('id', '>=', $startingText->id)
        ->take(ceil($words / $startingText->word_count) + 1)
        ->get();

        $fullText = implode(' ', $texts->pluck('text')->toArray());
        $trimmedText = implode(' ', explode(' ', $fullText, $words + 1));

        return response()->json(['ipsum_text' => $trimmedText]);
    }

    /**
     * Generate ipsum text by sentences.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateBySentences(Request $request)
    {
        $sentences = $request->query('sentences', 5);

        $startingText = DonQuixoteText::inRandomOrder()->first();
        $texts = DonQuixoteText::where('id', '>=', $startingText->id)
        ->take($sentences)
        ->get();

        $fullText = implode(' ', $texts->pluck('text')->toArray());

        return response()->json(['ipsum_text' => $fullText]);
    }
}
