<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smoke extends Model
{
	protected $connection = 'exp';
    protected $table = 'Smoke';
    public $timestamps = false;

    protected $fillable = ['s1','s2','s2_age','s3','s3_age','s4','s4_age','s5','s6','Aditional_Questions_id'];

    public function dietH(){
    	return $this->belongsTo('App\DietHis', 'Diet_id');
    }

    public function aditional(){
    	return $this->hasOne('App\Aditional','Smoke_id');
    }
}
