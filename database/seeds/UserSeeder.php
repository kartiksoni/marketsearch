<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $num_created_users = 100;

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\User::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        for ($x = 0; $x <= $num_created_users; $x++)
        {

            $data = [
                'name'=> $faker->name,
                'email'=> $faker->email,
                'password'=> \Hash::make('password'),
            ];

            $user = \App\User::create($data);
            $user->password = $data['password'];
            $user->save();
        }
    }
}
