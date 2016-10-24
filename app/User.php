<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password', 'rol_id', 'image_user_id', 'username', 'nutrition', 'therapy'];

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
    	return $this->hasMany('App\Workout', 'User_id');
    }

    public function modules(){
        return $this->belongsToMany('App\Module', 'user_has_module', 'User_id', 'Module_id');
    }

    public function modN(){
        return $this->belongsTo('App\NutM', 'module_id');
    }

    public function Informtaion(){
        return $this->belongsTo('App\Information','Information_id');
    }
}
