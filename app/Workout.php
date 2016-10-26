<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $connection = 'fit';
    public $timestamps = false;
    protected $table = 'Workout';

    protected $fillable = ['Current_date','Start_time','End_time','Scale_weight','Body_fat','Fitness_goal','Sleep_hrs','Name_workout','user_id'];

    //relaciones
    public function cardios(){
    	return $this->hasMany('App\Cardio', 'Workout_id');
    }

    public function trainings(){
    	return $this->hasMany('App\Training', 'Workout_id');	
    }

    public function diets(){
    	return $this->hasMany('App\Diet', 'Workout_id');	
    }

    public function user(){
    	return $this->belongsTo('App\User', 'User_id');
    }

}
