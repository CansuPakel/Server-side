<?php
/**
 * Created by PhpStorm.
 * User: CansuPakel
 * Date: 29/05/19
 * Time: 23:03
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Order;
use Auth;
use Session;
use OrdersHasProducts;
class PlaceOrder
{
	public function placeOrder(Request $request){

		if(Auth::user()){
			$person = Auth::user()->id;
			$order = new Order;
			$order->user_id = $person;
			$order->payment_type = $request->kind;
			$order->totalprice = session('total');
			$order->save();
			$cart = session()->get('cart');

			foreach($cart as $item){

				$order->product()->attach(
					array(
						1 => array('order_id'=>$order->id ,'product_id' => $item['id'],'quantity' =>$item['quantity'] ),
					)
				);

			}


			Session::forget('cart');
			Session::forget('total');
			Session::forget('countProducts');
			return redirect('/')->with('succes','Order has been placed');


		}else{
			return redirect('/login')->with('error','Please login first or create an account.');
		}







	}
}