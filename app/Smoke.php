<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\NullableFields;

class Smoke extends Model
{
    use NullableFields;

	protected $connection = 'exp';
    protected $table = 'Smoke';
    public $timestamps = false;

    protected $nullable = ['s2','s2_age','s3','s3_age','s4','s4_age'];

    protected $fillable = ['s1','s2','s2_age','s3','s3_age','s4','s4_age','s5','s6','Aditional_Questions_id'];

    public function dietH(){
    	return $this->hasOne('App\DietHis', 'Smoke_id');
    }

    public function aditional(){
    	return $this->belongsTo('App\Aditional','Aditional_Questions_id');
    }
}
