<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prop_categories')->insert([
            'category' => 'Rumah',
        ]);

        DB::table('prop_categories')->insert([
            'category' => 'Villa',
        ]);

        DB::table('prop_categories')->insert([
            'category' => 'Tanah',
        ]);
    }
}
