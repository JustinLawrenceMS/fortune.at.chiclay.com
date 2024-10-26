<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonQuixoteText;
use Illuminate\Http\Request;

class DonQuixoteTextController extends Controller
{
    public function generate(Request $request)
    {
        $length = $request->query('length', 1);
        $words = $request->query('words', 100);

        $paragraphs = DonQuixoteText::inRandomOrder()->take($length)->get();

        $ipsumText = [];
        foreach ($paragraphs as $paragraph) {
            $wordsInParagraph = explode(' ', $paragraph->text);
            $selectedWords = array_slice($wordsInParagraph, 0, $words);
            $ipsumText[] = implode(' ', $selectedWords);
        }

        return response()->json(['ipsum_text' => $ipsumText]);
    }
}
