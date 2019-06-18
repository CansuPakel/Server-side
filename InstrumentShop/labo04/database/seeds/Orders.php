<?php

use Illuminate\Database\Seeder;

class Orders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('orders')->insert([
			['user_id'=> 1, 'payment_type' =>'paypal', 'totalprice'=>279.00],
			['user_id'=>2, 'payment_type'=> 'credit cart', 'totalprice' =>369.00],
		]);
    }
}
