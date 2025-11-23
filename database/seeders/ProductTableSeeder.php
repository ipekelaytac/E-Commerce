<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Models\product;
use Models\productDetail;
use Faker\Factory as Faker;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        $faker = Faker::create();
        foreach (range(1,30) as $value){
           $product = DB::table('products')->insert([
                'product_name'=>$faker->name,
                'slug'=>$faker->slug,
                'comment'=>$faker->paragraph(20),
                'price'=>$faker->randomFloat(3,1,20)
            ]);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
