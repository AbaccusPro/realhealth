<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public $timestamps = false;
    protected $table = 'Training';

    protected $fillable = ['Excercise','Weight','Sets','Reps','Rest','Notes','Workout_id'];

    public function workout(){
    	return $this->belongsTo('App\Workout', 'Workout_id');
    }
}
