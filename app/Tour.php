<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    function categories(){
    	return $this->belongsToMany(TourCategory::class, 'tour_category');
    }
}
