<?php

use Illuminate\Database\Seeder;

class Images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('images')->insert([
			['product_id'=> 1, 'path' =>'guitar1a.jpg'],
			['product_id'=>1, 'path'=> 'guitar1b.jpg'],
			['product_id'=>2, 'path' => 'guitar2a.jpg'],
			['product_id'=> 2, 'path' => 'guitar2b.jpg'],
			['product_id'=> 3, 'path' => 'guitar3a.jpg'],
			['product_id'=> 3, 'path' => 'guitar3b.jpg'],
			['product_id'=> 4, 'path' => 'guitar4a.jpg'],
			['product_id'=> 4, 'path' => 'guitar4b.jpg'],
			['product_id'=> 5, 'path' => 'piano1a.jpg'],
			['product_id'=> 5, 'path' => 'piano1b.jpg'],

		]);

	}
}
