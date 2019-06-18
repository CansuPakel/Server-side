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
use Illuminate\Http\Request;
use View;

class ProductController
{
	public function allProducts(){

		$categories = Category::all();

		return view('index', [
			'categories' => $categories,
		]);
	}

	public function productsOfCategory($name){

		$products = Category::where('name' , '=', $name)->get();

		return view('product', [
			'products' => $products,
		]);
	}

	public function detailsOfProduct($category,  $id){

		$products = Category::where('name' , '=', $category)->get();

		$details= Product::find($id);

		return view('detailproduct', [
			'products' => $details,
		]);
	}
}

