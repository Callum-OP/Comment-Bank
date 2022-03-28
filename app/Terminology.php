<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminology extends Model
{
    protected $fillable = [ 
        'comment', 
        'first_name', 
        'last_name', 
        'email', 
        'tone',        
    ];
}
