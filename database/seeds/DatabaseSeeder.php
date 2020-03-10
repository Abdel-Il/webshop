<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'first_name' => Str::random(10),
          'last_name' => Str::random(10),
          'email' => Str::random(10).'@asd.nl',
          'password' => bcrypt('123456789'),
        ]);
        
        DB::table('categories')->insert([
          'name' => Str::random(10),
        ]);
        
        DB::table('products')->insert([
          // 'image' => image('image', 400, 300),
          'title' => Str::random(10),
          'price' => rand(10, 100),
          'description' => bcrypt('123456789'),
        ]);
    }
}
