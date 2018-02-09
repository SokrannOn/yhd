<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public  function user(){
        return $this->belongsTo(User::class);
    }
    public  function positions(){
        return $this->hasMany(Position::class);
    }
}
