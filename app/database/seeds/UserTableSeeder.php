<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
        User::create([
            'user_name' => 'Vallel Blanco',
            'email' => 'vallelblanco@gmail.com',
            'password' => Hash::make('admin'),
            'status' => 'Active',
        ]);
	}

}