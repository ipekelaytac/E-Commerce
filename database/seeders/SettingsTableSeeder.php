<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert(['key'=>'index_list_product_number' ,'value' => '3']);
        DB::table('settings')->insert(['key'=>'index_featured_product_number','value' => '4']);
        DB::table('settings')->insert(['key'=>'index_lots_selling_product_number' ,'value' => '4']);
        DB::table('settings')->insert(['key'=>'index_discount_product_number' ,'value' => '4']);

    }
}
