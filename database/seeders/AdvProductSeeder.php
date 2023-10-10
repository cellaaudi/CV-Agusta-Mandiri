<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adv_products')->insert([
            'name' => 'Billboard',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Signboard',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Neon Box',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => '3D Letter',
            'category' => 'IO',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Car Panel',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Alumunium Composite Panel',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Neon Sign',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'LED Sign',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Kontruksi',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Digital Printing',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Truck Branding',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Container Branding',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Kartu Nama',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'X Banner/Roll-Up Banner',
            'category' => 'IO',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Flyer',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Umbul-umbul',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Acrylic Display',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Emboss Display',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Cutting Sticker',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Sand Blasting',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Wallpaper',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Partsi Kaca',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Partsy Gypsum',
            'category' => 'Indoor',
        ]);
    }
}
