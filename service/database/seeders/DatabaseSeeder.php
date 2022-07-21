<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Autoservice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        

        $faker = Faker::create('lt_LT');
        for($i = 0 ; $i < 10; $i++) {
        DB::table('autoservices')->insert([
            'name' =>  $faker->company,
            'phone' => '+370' . $faker->numberBetween($min = 60000000, $max = 69999999),
            'address' => $faker->address,
        ]);
    };
    $faker = Faker::create('lt_LT');
        for($i = 0 ; $i < 20; $i++) {
        DB::table('mechanics')->insert([
            'name' => $faker->firstNameMale,
            'surname' => $faker->lastnameMale,
            'images' => 'https://joeschmoe.io/api/v1/male/random' . rand(1, 20),
            'autoservice_id' => rand(1, 10),
        ]);
    };


        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 5,
        ]);
    }
}
