<?php

use Malarrimo\Entities\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->delete();

        User::create([
            'user_name' => 'Vallel Blanco',
            'email' => 'vallelblanco@gmail.com',
            'password' => 'admin',
        ]);
	}

}