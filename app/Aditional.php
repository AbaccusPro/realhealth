<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aditional extends Model
{
	protected $connection = 'exp';
    protected $table = 'Aditional_questions';
    public $timestamps = false;

    protected $fillable = ['a1','a1_5','a2','a3','a4','a5','a6','a6_5','a7','a7_5','a8','a9','History_id'];

    public function history(){
    	return $this->hasOne('App\History', 'Aditional_questions_id');
    }

    public function smoke(){
    	return $this->belongsTo('App\Smoke', 'Smoke_id');
    }
}
