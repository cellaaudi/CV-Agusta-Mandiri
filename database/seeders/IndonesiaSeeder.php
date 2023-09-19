<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ini_set('memory_limit', '-1');

        $sql = file_get_contents(database_path() . '/seeders/sql/indonesia.sql');
        // $bin = ''
    }
}
