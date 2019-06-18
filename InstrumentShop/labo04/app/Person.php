<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $primaryKey = 'id';
	protected $fillable = ['quantity'];

	public function order()
	{
		return $this->hasMany('App\Order');
	}
}
