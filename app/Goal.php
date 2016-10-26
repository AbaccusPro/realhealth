<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\NullableFields;

class Goal extends Model
{
    use NullableFields;

	protected $connection = 'exp';
    protected $table = 'Goal';
    public $timestamps = false;

    protected $nullable = [
        'Improved_health',
        'Improved_endurance',
        'Increased_strength',
        'Sport_specific',
        'Increased_muscle_mass',
        'Fat_loss',
        'Increased_power',
        'Weight_gain'
    ];


    protected $fillable = ['Improved_health','Improved_endurance','Increased_strength','Sport_specific','Increased_muscle_mass','Fat_loss','Increased_power','Weight_gain','Body_Composition_id'];

    public function body(){
    	return $this->belongsTo('App\Body', 'Body_Composition_id');
    }

    public function history(){
    	return $this->hasOne('App\History', 'Goal_id');
    }
}
