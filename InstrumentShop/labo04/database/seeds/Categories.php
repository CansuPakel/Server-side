<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categories =[
			['name' =>'guitars'],
			['name' =>'piano'],
			['name' =>'woondwinds'],
			['name' =>'drums'],
			['name' =>'keyboards'],
			['name' =>'percussion'],
		];

		DB::table('categories')->insert($categories);
    }
}
