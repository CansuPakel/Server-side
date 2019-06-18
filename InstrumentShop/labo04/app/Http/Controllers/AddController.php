<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;

use App\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use View;


class AddController extends BaseController
{
	protected $fillable = [
		'created_at','updated_at','category_id','title','description','price'
	];


	public function show(){

		$categories = Category::all();

		return view('addinstrument', [
			'categories' => $categories,
		]);
	}

	public function store(Request $request){


		$request->validate([
			'title' => 'required|max:125',
			'price' => 'required|numeric|gt:0',
			'description' => 'required',
			'file' => 'required|mimes:jpeg,png,jpg',
			'category_id' =>'required',
		]);


		$category = Category::find($request->category_id);

		$product = new Product;
		$product->name = $request->title;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->category()->associate($category);
		$product->save();



		$image = new Image;
		$image->path = basename($request->file('file')->store('public/images'));
		$image->product_id = $product->id;
		$image->save();

		return redirect('/')->with('succes','Instrument has been added');

	}
}
