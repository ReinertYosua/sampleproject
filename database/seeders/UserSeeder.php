<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for ($i=1; $i<=50 ; $i++) { 
            \DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'role' => 'user',
                'password'=> Hash::make($faker->password)
            ]);
        }
    }
}
