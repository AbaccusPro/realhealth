<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\NullableFields;

class DietHis extends Model
{
	use NullableFields;

    protected $connection = 'exp';
    protected $table = 'Diet_history';
    public $timestamps = false;

    protected $nullable = ['d7','Beef','Fish','Desserts','Pork','Fowl','Fried_foods','Milk','Buttermilk','Skim_milk','Low_milk2','Low_milk1','Coffee','Tea','Soda','Water','d9_5','d10_5','Smoke_id'];

    protected $fillable = ['d1','d2','d3','d4','d5','d6','d7','Beef','Fish','Desserts','Pork','Fowl','Fried_foods','Milk','Buttermilk','Skim_milk','Low_milk2','Low_milk1','Coffee','Tea','Soda','Water','d8','d9','d9_5','d10','d10_5','Smoke_id'];

    public function smoke(){
    	return $this->belongsTo('App\Smoke', 'Smoke_id');
    }
}
