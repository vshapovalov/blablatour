<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $fillable = [
		'email',
		'name',
		'phone',
		'target_name',
		'target_date',
		'persons'
	];
	public $timestamps = false;
}
