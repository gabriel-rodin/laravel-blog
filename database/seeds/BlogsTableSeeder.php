<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = mt_rand(1,7);
        $user = mt_rand(1,2);
        $faker = Faker::create('App\Blog');
    	foreach (range(1,100) as $index =>$key) {
            DB::table('blogs')->insert([
                'user_id' => $user,
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'category_id' => 7,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
