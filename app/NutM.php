<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutM extends Model
{
    protected $connection = 'nutrition';
    public $timestamps = false;
    protected $table = 'nut_module';


    public function users(){
    	return $this->hasMany('App\User', 'module_id');
    }
}
