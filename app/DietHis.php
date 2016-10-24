<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietHis extends Model
{
    protected $connection = 'exp';
    protected $table = 'Diet_history';
    public $timestamps = false;

    protected $fillable = ['d1','d2','d3','d4','d5','d6','d7','Beef','Fish','Desserts','Pork','Fowl','Fried_foods','Milk','Buttermilk','Skim_milk','Low_milk2','Low_milk1','Coffee','Tea','Soda','d8','d9','d9_5','d10','d10_5','Smoke_id'];

    public function smoke(){
    	return $this->hasOne('App\Smoke', 'Diet_id');
    }
}
