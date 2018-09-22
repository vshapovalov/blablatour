<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
    	'name', 'phone', 'email', 'subject', 'message'
    ];

    public $timestamps = false;
}
