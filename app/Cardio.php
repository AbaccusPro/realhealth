<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardio extends Model
{
    public $timestamps = false;
    protected $table = 'Cardio';

    protected $fillable = ['Excercise','Measure','Notes','Workout_id'];

    public function workout(){
    	return $this->belongsTo('App\Workout', 'Workout_id');
    }
}
