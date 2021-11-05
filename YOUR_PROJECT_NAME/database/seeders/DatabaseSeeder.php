<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StudentsSeeder;
use DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
       foreach (range(1,100) as $index){
           DB::table('students')->insert([
                'ic' => $faker->randomNumber,
                'name' => $faker->name,
                'email' => $faker->email,
                'phoneno' => $faker->phoneNumber,
                'password' => $faker->md5,
           ]);
    }
}
}