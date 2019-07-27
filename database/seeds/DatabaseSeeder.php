<?php

use Illuminate\Database\Seeder;
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
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10000; $i++) {
            \App\Skeleton::create([
               'textfield' => $faker->name,
               'textarea' => $faker->text,
               'date' => $faker->date,
            ]);
        }
    }
}
