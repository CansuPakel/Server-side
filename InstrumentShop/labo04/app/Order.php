<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $primaryKey = 'id';
	protected  $table='orders';
	protected $fillable = ['quantity'];

	public function person()
	{
		return $this->belongsTo('App\Person');
	}

	public function product()
	{
		return $this->belongsToMany('App\Product')->as('orders_has_products');
	}
}
