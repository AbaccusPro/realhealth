<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
	protected $connection = 'exp';
    protected $table = 'Basic_information';
    public $timestamps = false;

    protected $fillable = ['Name','Gender','Age','Birthday','Height','Weight','Body_fat','Marital_status','Sex','Education','Position','Employer','Address','Phone','Degree','User_id'];

    public function user(){
    	return $this->belongsTo('App\User', 'User_id');
    }

////////////////////////////////7
    public function body(){
    	return $this->hasOne('App\Body', 'Basic_information_id');
    }
}
