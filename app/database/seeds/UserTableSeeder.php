<?php

use Malarrimo\Entities\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
        User::create([
            'user_name' => 'Vallel Blanco',
            'email' => 'vallelblanco@gmail.com',
            'password' => 'admin',
        ]);
	}

}