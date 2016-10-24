<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
	protected $connection = 'exp';
    protected $table = 'Body_composition';
    public $timestamps = false;

    protected $fillable = ['Abdominal','Triceps','Chest','Mid_axillary','Subcapsular','Suprailiac','Thigh','Neck','Shoulder','Biceps','Waist','Hips','Calf','Basic_Information_id','Chest_cm','Thigh_cm'];

    public function information(){
    	return $this->hasOne('App\Information','Body_composition_id');
    }

    public function goal(){
    	return $this->belongsTo('App\Goal','Goal_id');
    }
}
