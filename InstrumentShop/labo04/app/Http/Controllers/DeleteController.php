<?php

namespace App\Http\Controllers;
use App\Product;
use App\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;


class DeleteController extends BaseController
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function delete($id){

		$images = Image::where('product_id','=',$id)->get();
		$product= Product::find($id);
		if ($product != null) {
			$images->each->delete();
			$product->delete();
		}
		return redirect('/')->with('succes','Instrument has been deleted');

	}
}