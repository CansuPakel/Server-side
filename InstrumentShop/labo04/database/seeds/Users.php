<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'firstname' => 'Cansu',
			'lastname' => 'Pakel',
			'email' => 'cansu.pakel@hotmail.com',
			'password'=>Hash::make('Azerty123'),
			'gender' => 'female',
			'role'=>'admin',
			'phonenumber' => '0481111111',
			'address'=> 'Odisee gent',
			'zipcode' => '9000',
		]);

		DB::table('users')->insert([
			'firstname' => 'Pieter',
			'lastname' => 'Van peteghem',
			'email' => 'pieter.vanpeteghem@hotmail.com',
			'password'=>Hash::make('Azerty123'),
			'gender' => 'male',
			'role'=>'user',
			'phonenumber' => '0481133111',
			'address'=> 'Odisee gent',
			'zipcode' => '9000',
		]);
    }
}
