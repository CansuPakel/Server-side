<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		$this->call(Categories::class);
		$this->call(Products::class);
		$this->call(Images::class);
		$this->call(Users::class);
		$this->call(Orders::class);
		$this->call(OrdersHasProducts::class);


	}
}
