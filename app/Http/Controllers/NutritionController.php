<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NutritionController extends Controller
{
    public function index(){
    	return view('nutrition.list');
    }

    public function therapy(){
    	return view('therapy.list');
    }
}
