<?php

use Illuminate\Database\Seeder;

class OrdersHasProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('order_product')->insert([
			['order_id'=> 1, 'product_id' =>1,'quantity'=>1],
		]);
    }
}
