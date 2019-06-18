<?php
/**
 * Created by PhpStorm.
 * User: CansuPakel
 * Date: 16/05/19
 * Time: 11:04
 */

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Image;
use View;
use Illuminate\Http\Request;

class ShoppingCart
{

	public function show(){
		return view('shoppingcart');
	}

	public function add($id)
	{
		$product = Product::find($id);
		$cart = session()->get('cart');
		$total = 0;

		if(!$cart){

			$cart[$id] = [
				'id' => $id,
				'name' => $product->name,
				'description' => $product->discription,
				'price' => $product->price,
				'image' => Image::where('product_id', '=', $id)->get(),
				'quantity' => 1
			];

			$total = $this->totalPrice($cart);

			session()->put([
				'cart'=> $cart,
				'total'=>$total,'
				countProducts'=>$this->totalProducts($cart)
			]);

			return redirect()->back()->with(['succes'=>'Product '.$cart[$id]['name'] .' is added!']);
		}


		if (isset($cart[$id])) {

			$cart[$id]['quantity'] += 1;

			$total = $this->totalPrice($cart);

			session()->put([
				'cart'=> $cart,
				'total'=>$total,
				'countProducts'=>$this->totalProducts($cart)
			]);

			return redirect()->back()->with(['succes'=>'Product '.$cart[$id]['name'] .' is added!']);

		} else {

			$cart[$id] = [
				'id' => $id,
				'name' => $product->name,
				'description' => $product->discription,
				'price' => $product->price,
				'image' => Image::where('product_id', '=', $id)->get(),
				'quantity' => 1
			];


			$total = $this->totalPrice($cart);

			session()->put([
				'cart'=> $cart,
				'total'=>$total,
				'countProducts'=>$this->totalProducts($cart)
			]);

			return redirect()->back()->with(['succes'=>'Product '.$cart[$id]['name'] .' is added!']);
		}
	}

	public function totalPrice($cart)
	{
		$total = 0;
		foreach ($cart as $id => $product) {
			$total += $product['quantity'] * $product['price'];
		}
		return $total;
	}

	public function totalProducts($cart)
	{
		$total = 0;
		foreach ($cart as $id => $product) {
			$total += $product['quantity'];
		}
		return $total;
	}

	public function delete($id)
	{
		$cart = session()->get('cart');

		$total = $this->totalPrice($cart);

		if($cart[$id]['quantity'] ==1){

			$total -= $cart[$id]['price'];
			unset($cart[$id]);

			session()->put([
				'cart'=> $cart,
				'total'=>$total,
				'countProducts'=>$this->totalProducts($cart)
			]);

		}else {

			$total -= $cart[$id]['price'];
			$cart[$id]['quantity'] -=1;

			session()->put([
				'cart'=> $cart,
				'total'=>$total,
				'countProducts'=>$this->totalProducts($cart)
			]);
		}

		return redirect()->back()->with(['succes'=>'Product is deleted!']);

	}


	public function checkout()
	{
		return view('checkout');
	}






}
