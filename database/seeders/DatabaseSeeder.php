<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();
        
        $this->call(AdvProductSeeder::class);
        $this->call(CarBrandSeeder::class);
        $this->call(CarCategorySeeder::class);
        $this->call(PropCategorySeeder::class);
        $this->call(TradeCategorySeeder::class);
        $this->call(UserSeeder::class);
    }
}
