<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DonQuixoteTextSeeder extends Seeder
{
    public function run()
    {
	    $lines = Storage::disk('local')->get('don_quixote.json');
	    $lines = json_decode($lines, true);
        foreach ($lines as $line) {
            DB::table('don_quixote_texts')->insert([
                'text' => $line,
                'text_length' => strlen($line),
                'word_count' => count(explode(' ', $line)),
            ]);
        }
    }
}
