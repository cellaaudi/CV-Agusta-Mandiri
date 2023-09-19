<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_brands')->insert([
            'brand' => 'Hyundai',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Toyota',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Daihatsu',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Honda',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Mitsubishi',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Suzuki',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Wuling',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Chery',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'KIA',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Mazda',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Subaru',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Mercedes-Benz',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Renault',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Isuzu',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Volvo',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Lexus',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Mini',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'BMW',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Volkswagen',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Peugeot',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Jeep',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Audi',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Maserati',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'MG',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Ford',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Mahindra',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'TATA',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'DFSK',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Jaguar',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Nissan',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'Citroen',
        ]);

        DB::table('car_brands')->insert([
            'brand' => 'ORA',
        ]);
    }
}
