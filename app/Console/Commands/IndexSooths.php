<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class IndexSooths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sooths:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This reindexes the sooths table and prevents null values from resulting';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::statement("UPDATE sooths AS s,
            (SELECT @r := 0) as r
            SET s.id = @r := @r + 1
        ");

        return Command::SUCCESS;
    }
}
