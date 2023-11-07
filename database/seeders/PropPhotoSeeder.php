<?php

namespace Database\Seeders;

use App\Models\PropertyPhoto;
use Illuminate\Database\Seeder;

class PropPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_1',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_2',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_3',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_4',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_5',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_6',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_7',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_sanggulan_tabanan_8',
            'prop_product_id' => 1,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_mahendradata_1',
            'prop_product_id' => 2,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_mahendradata_2',
            'prop_product_id' => 2,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_mahendradata_3',
            'prop_product_id' => 2,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/rumah_mahendradata_4',
            'prop_product_id' => 2,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/tanah_nusa_dua_1',
            'prop_product_id' => 3,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/tanah_nusa_dua_2',
            'prop_product_id' => 3,
        ]);

        PropertyPhoto::create([
            'url' => 'prop/tanah_nusa_dua_3',
            'prop_product_id' => 3,
        ]);
    }
}
