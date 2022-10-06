<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('categories')->truncate();
        $id = DB::table('categories')->insertGetId(['category_name' => 'Elektronik', 'slug' => 'elektronik']);
        DB::table('categories')->insert(['category_name' => 'Bilgisayar/Tablet', 'slug' => 'bilgisayar-tablet', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Telefon', 'slug' => 'telefon', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Tv ve Ses Sistemleri', 'slug' => 'tv-ses', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Kamera', 'slug' => 'kamera', 'top_id'=>$id]);

        $id = DB::table('categories')->insertGetId(['category_name' => 'Kitap', 'slug' => 'kitap']);
        DB::table('categories')->insert(['category_name' => 'Edebiyat', 'slug' => 'edebiyat', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Sınavlara Hazırlık', 'slug' => 'sınav', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Çoçuk', 'slug' => 'cocuk', 'top_id'=>$id]);
        DB::table('categories')->insert(['category_name' => 'Bilgisayar', 'slug' => 'bilgisayar', 'top_id'=>$id]);

        DB::table('categories')->insert(['category_name' => 'Dergi', 'slug' => 'dergi']);
        DB::table('categories')->insert(['category_name' => 'Mobilya', 'slug' => 'mobilya']);
        DB::table('categories')->insert(['category_name' => 'Dekarasyon', 'slug' => 'dekarasyon']);
        DB::table('categories')->insert(['category_name' => 'Kozmetik', 'slug' => 'kozmetik']);
        DB::table('categories')->insert(['category_name' => 'Kişisel Bakım','slug' => 'kisisel-bakim']);
        DB::table('categories')->insert(['category_name' => 'Giyim ve Moda', 'slug' => 'giyim-moda']);
        DB::table('categories')->insert(['category_name' => 'Anne ve Çoçuk', 'slug' => 'anne-cocuk']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
