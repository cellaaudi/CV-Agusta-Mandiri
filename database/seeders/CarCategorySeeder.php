<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_categories')->insert([
            'category' => 'SUV',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'MPV',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Crossover',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Hatchback',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Sedan',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Sport Sedan',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Convertible',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Station Wagon',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Off-Road',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Pickup',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Elektrik',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'Hybrid',
        ]);

        DB::table('car_categories')->insert([
            'category' => 'LCGC (Low-Cost Green Car)',
        ]);
    }
}
