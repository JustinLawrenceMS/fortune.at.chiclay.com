<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    $this->call([
		    \Database\Seeders\DonQuixoteEnglishTextSeeder::class,
		    \Database\Seeders\DonQuixoteSpanishTextSeeder::class,
            \Database\Seeders\SoothSeeder::class,
	    ]);

// \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
