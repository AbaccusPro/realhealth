<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\NullableFields;

class Body extends Model
{
    use NullableFields;

	protected $connection = 'exp';
    protected $table = 'Body_composition';
    public $timestamps = false;

    protected $nullable = ['Abdominal','Triceps','Chest','Mid_axillary','Subcapsular','Suprailiac','Thigh','Neck','Shoulder','Biceps','Waist','Hips','Calf','Chest_cm','Thigh_cm'];

    protected $fillable = ['Abdominal','Triceps','Chest','Mid_axillary','Subcapsular','Suprailiac','Thigh','Neck','Shoulder','Biceps','Waist','Hips','Calf','Basic_Information_id','Chest_cm','Thigh_cm'];

    public function information(){
    	return $this->belongsTo('App\Information','Basic_Information_id');
    }

    public function goal(){
    	return $this->hasOne('App\Goal','Body_composition_id');
    }
}
