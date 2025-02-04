<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Quixotify\Controller as Con;
use Quixotify\Generator;

class DonQuixoteApiController extends Controller
{
    private const DEFAULT_CHARACTERS = 500;
    private const DEFAULT_WORDS = 100;
    private const DEFAULT_SENTENCES = 5;
    public string|null $language = null;
    /**
     * Generate ipsum text.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type (characters, words, sentences)
     * @param  int  $amount
     * @return \Illuminate\Http\JsonResponse
     */
    private function generateIpsumText(Request $request, string $type=null, int $amount=null)
    {
	    $type = $request->input('type');
	    $amount = $request->input('amount');
        $client = new Con($this->language);
        $generator = new Generator($client);

        $text = $generator->generate($type, $amount, $request->input('language'));

        return response()->json(['ipsum_text' => $text]);
    }

    public function generate(Request $request)
    {
	    return $this->generateIpsumText($request);
    }

    /**
     * Generate ipsum text by characters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateByCharacters(Request $request)
    {    
	$this->language = $request->input('language');

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
        $this->language = $request->input('language');

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
        $this->language = $request->input('language');

        $sentences = $request->query('sentences', self::DEFAULT_SENTENCES);

        return $this->generateIpsumText($request, 'sentences', $sentences);
    }
}
