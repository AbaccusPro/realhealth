<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
	protected $connection = 'fit';
    public $timestamps = false;
    protected $table = 'Diet';

    protected $fillable = ['Meal','Fods','Calories', 'Workout_id'];

    public function workout(){
    	return $this->belongsTo('App\Workout', 'Workout_id');
    }
}
