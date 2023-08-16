<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'cate_name'=>'iphone',
                'cate_slug'=>Str::slug('Iphone')
            ],
            [
                'cate_name'=>'Samsung',
                'cate_slug'=>Str::slug('Samsung')
            ],
        ];
        DB::table('vp_categories')->insert($data);
    }
}
