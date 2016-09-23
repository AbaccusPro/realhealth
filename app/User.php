<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password', 'rol_id', 'image_user_id', 'username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
    	return $this->belongsTo('App\Rol', 'rol_id');
    }

    public function image(){
    	return $this->belongsTo('App\ImageUser', 'image_user_id');
    }

    public function workouts(){
    	return $this->hasMany('App\Workout', 'user_id');
    }
}
