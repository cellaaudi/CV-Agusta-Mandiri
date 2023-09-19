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
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Signboard',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Neon Box',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => '3D Letter',
            'photo' => '-',
            'category' => 'IO',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Car Panel',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Alumunium Composite Panel',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Neon Sign',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'LED Sign',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Kontruksi',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Digital Printing',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Truck Branding',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Container Branding',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Kartu Nama',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'X Banner/Roll-Up Banner',
            'photo' => '-',
            'category' => 'IO',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Flyer',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Umbul-umbul',
            'photo' => '-',
            'category' => 'Outdoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Acrylic Display',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Emboss Display',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Cutting Sticker',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Sand Blasting',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Wallpaper',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Partsi Kaca',
            'photo' => '-',
            'category' => 'Indoor',
        ]);

        DB::table('adv_products')->insert([
            'name' => 'Partsy Gypsum',
            'photo' => '-',
            'category' => 'Indoor',
        ]);
    }
}
