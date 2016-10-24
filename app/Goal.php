<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
	protected $connection = 'exp';
    protected $table = 'Goal';
    public $timestamps = false;

    protected $fillable = ['Improved_health','Improved_endurance','Increased_strength','Sport_specific','Increased_muscle_mass','Fat_loss','Increased_power','Weight_gain','Body_Composition_id'];

    public function body(){
    	return $this->hasOne('App\Body', 'Goal_id');
    }

    public function history(){
    	return $this->belongsTo('App\History', 'History_id');
    }
}
