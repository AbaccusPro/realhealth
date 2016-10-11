<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    public $timestamps = false;

    public function users(){
    	return $this->belongsToMany('App\User', 'user_has_module', 'Module_id', 'User_id');
    }
}
