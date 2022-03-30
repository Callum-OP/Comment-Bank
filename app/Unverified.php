<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unverified extends Model
{
    protected $fillable = [ 
        'comment', 
        'first_name', 
        'last_name', 
        'email', 
        'tone',
        'type',        
    ];
}
