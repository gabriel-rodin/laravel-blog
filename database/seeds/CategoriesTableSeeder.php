<?php

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
        $categories = [
            'Health and Wellness',
            'Living Space',
            'Nutrition and Eats',
            'Entertainment',
            'Garden and Farm',
            'Attire',
            'Adventure'
        ];
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
