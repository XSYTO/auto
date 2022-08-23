<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Autoservice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use phpDocumentor\Reflection\Types\Nullable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('autoservices')->insert([
                'name' =>  $faker->company,
                'phone' => '+370' . $faker->numberBetween($min = 60000000, $max = 69999999),
                'address' => $faker->address,
            ]);
        };
        $faker = Faker::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        for ($i = 1; $i < 100; $i++) {
            DB::table('mechanics')->insert([
                'name' => $faker->foodName,
                'images' => "https://random.imagecdn.app/500/150" . rand(1, 20),
                'autoservice_id' => rand(1, 10),
            ]);
        };
        // $faker = Faker::create('lt_LT');
        // $services = shuffle(['Ratu montavimas', 'Alyvos keitimas', 'Diagnostika', 'Pilna Apziura', 'kita']);
        
        
        // for ($i = 0; $i <= 5; $i++) {
        //     DB::table('services')->insert([
        //         'name' => $services,
        //         'price' => rand(15, 60),
        //         'duration' =>  0,
        //         'autoservice_id'=>  rand(1,Autoservice::count()),
        //     ]);
        // };
            

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 5,
        ]);
    }
}
