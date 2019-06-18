<?php

namespace App\Http\Controllers;
use App\Product;
use App\Image;
use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use View;


class EditController extends BaseController
{

	public function show($category, $id){

		$product= Product::find($id);

		return view('editproduct', [
			'id' => $product->id,
			'name' => $product->name,
			'price' => $product->price,
			'category' => $product->category,
			'image' => $product->image[0]->path,
			'description' => $product->description,
		]);
	}

	public function edit(Request $request){
		$request->validate([
			'title' => 'required|max:125',
			'price' => 'required|numeric',
			'description' => 'required',
			'file' => 'mimes:jpeg,png,jpg',
			'category_id' =>'required',
		]);

		$product = Product::find($request->id);
		$category = Category::find($request->category_id);

		$product->name = $request->title;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->category()->associate($category);
		$product->save();

		$oldImage=$product->image[0]->path;


		if($request->file){
			$image = new Image;
			$image->path = basename($request->file('file')->store('public/images'));
			$image->product_id = $product->id;
			$image->save();
		}

		return redirect('/')->with('succes','Instrument has been changed');
	}
}

