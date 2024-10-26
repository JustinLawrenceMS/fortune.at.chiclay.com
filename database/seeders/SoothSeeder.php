<?php

namespace Database\Seeders;

use App\Models\Sooth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SoothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $lines = Storage::disk('local')->get('sooths.json');
	    $lines = json_decode($lines);
        foreach ($lines as $line) {
		$sooth = new Sooth;
		$sooth->sooth = $line->sooth;
		$sooth->save();
	}
    }
}
