<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'CV Agusta Mandiri',
            'about_us' => 'CV. Agusta Mandiri adalah salah satu penyedia jasa periklanan yang berdiri sejak awal 2014.
            Dimana beberapa individu dengan berbagai macam latar belakang di dunia pekerjaan adalah merupakan
            keuntungan buat kami agar CV. Agusta Mandiri bisa lebih kuat dan solid.\n\nSelektif dalam proses seleksi sumber daya manusia yang profesional merupakan andalan kami dalam menciptakan kepuasan bagi pelanggan. Selain itu harga yang kami tawarkan juga sangat kompetitif di pasaran dengan tidak mengurangi kualitas hasil.\n\nSeiring perkembangan zaman dan visi misi, kami selalu berkomitmen secara continue melakukan inovasi dan
            perubahan demi menjadi yang terbaik, handal dan kreatif serta dipercaya oleh masyarakat luas.',
            'vision' => 'Menjadi solusi partner periklanan, otomotif, dan properti terpercaya.'
        ]);
    }
}
