<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $primaryKey = 'id';

	protected $fillable = ['email', 'password','quantity'];

	protected $hidden = 'password';

	protected $table ='products';

	public function image()
	{
		return $this->hasMany('App\Image');
	}

	public function order()
	{
		return $this->belongsToMany('App\Order')->as('orders_has_products');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
