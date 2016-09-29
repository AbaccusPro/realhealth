<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardio extends Model
{
    public $timestamps = false; //timestamps a false para no guardar fecha de guardado
    protected $table = 'Cardio'; //hace referencia ala tabla Cardio

    //campos que se pueden guardar en el modelo...
    protected $fillable = ['Excercise','Measure','Notes','Workout_id'];

    //metodo de relacion que indica que cardio tiene solo un workout
    public function workout(){
    	return $this->belongsTo('App\Workout', 'Workout_id');
    }
}
