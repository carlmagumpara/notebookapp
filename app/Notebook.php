<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function note()
    {
    	return $this->hasMany('App\Note');
    }

}
