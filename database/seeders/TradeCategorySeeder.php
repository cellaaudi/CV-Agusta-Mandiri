<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TradeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trade_category')->insert([
            'category' => 'Mobil',
        ]);

        DB::table('trade_category')->insert([
            'category' => 'Motor',
        ]);
    }
}
