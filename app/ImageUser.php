<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    public $timestamps = false;
    protected $table = 'image_user';

    protected $fillable = ['File','Mime','Name','Size'];

    public function users(){
    	return $this->hasMany('App\User', 'image_user_id');
    }
}
