<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $timestamps = false;
    protected $table = 'catrol';

    public function users(){
    	return $this->hasMany('App\User', 'rol_id');
    }
}
