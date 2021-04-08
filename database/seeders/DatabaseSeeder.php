<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Illuminate\Support\Str;

use DB,Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');
        //  for($i = 1; $i <= 120; $i++){
            DB::table('users')->insert([
                'email'=> $faker->email,
                'name' => $faker->name,
                'username' => $faker->username,
                'password'=>Hash::make('damarwulan'),
            ]);
        // }
    }
}
