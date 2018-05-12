<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);
        }

    }
}
