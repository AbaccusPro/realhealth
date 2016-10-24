<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	protected $connection = 'exp';
    protected $table = 'History';
    public $timestamps = false;

    protected $fillable = ['Back_trouble','Neck_trouble','Joint_injury','Carpal_tunnel','Bleeding','Enlarged_glands','Rashes','Unexplained_lumps','Chronic_fatigue','Night_sweats','Undesired_weight_loss','Snoring','Difficulty_sleeping','Low_blood_sugar','Goal_id'];

    public function goal(){
    	return $this->hasOne('App\Goal', 'History_id');
    }

    public function aditional(){
    	return $this->belongsTo('App\Aditional', 'Aditional_questions_id');
    }
}
