<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    protected $table = 'excursions';

    function categories(){
		return $this->belongsToMany(ExcursionCategory::class, 'excursion_category');
	}
}
