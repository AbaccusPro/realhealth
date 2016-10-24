<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Information;
use App\Aditional;
use App\DietHis;
use App\Goal;
use App\Smoke;
use App\History;
use App\Body;


class ExpedientController extends Controller
{
    public function expedient(){
    	return view('users.history.expedient');
    }

    public function storeExpedient(Request $request){
    	$data = $request->all();

    	$info = new Information();
    	$info->Name					= $request->input('Name');
    	$info->Gender				= $request->input('Gender');
    	$info->Age					= $request->input('Age');
    	$info->Birthday				= $request->input('Birthday');
    	$info->Height				= $request->input('Height');
    	$info->Weight				= $request->input('Weight');
    	$info->Body_fat				= $request->input('Body_fat');
    	$info->Marital_status		= $request->input('Marital_status');
    	$info->Sex					= $request->input('Sex');
    	$info->Education			= $request->input('Education');
    	$info->Position				= $request->input('Position');
    	$info->Employer				= $request->input('Employer');
    	$info->Address				= $request->input('Address');
    	$info->Phone				= $request->input('Phone');
    	$info->Degree				= $request->input('Degree');
    	$info->User_id				= \Auth::user()->id;
    	$info->save();

    	$body = new Body();
    	$body->Abdominal			= $request->input('Abdominal');
    	$body->Triceps				= $request->input('Triceps');
    	$body->Chest				= $request->input('Chest');
    	$body->Mid_axillary			= $request->input('Mid_axillary');
    	$body->Subcapsular			= $request->input('Subcapsular');
    	$body->Suprailiac			= $request->input('Suprailiac');
    	$body->Thigh				= $request->input('Thigh');
    	$body->Neck					= $request->input('Neck');
    	$body->Shoulder				= $request->input('Shoulder');
    	$body->Biceps				= $request->input('Biceps');
    	$body->Waist				= $request->input('Waist');
    	$body->Hips					= $request->input('Hips');
    	$body->Calf					= $request->input('Calf');
    	$body->Chest_cm				= $request->input('Chest_cm');
    	$body->Thigh_cm				= $request->input('Thigh_cm');
    	$body->Basic_Information_id	= $info->id;
    	$body->save();

    	$goal = new Goal();
    	$goal->Improved_health			= $request->input('Improved_health');
    	$goal->Improved_endurance		= $request->input('Improved_endurance');
    	$goal->Increased_strength		= $request->input('Increased_strength');
    	$goal->Sport_specific			= $request->input('Sport_specific');
    	$goal->Increased_muscle_mass	= $request->input('Increased_muscle_mass');
    	$goal->Fat_loss					= $request->input('Fat_loss');
    	$goal->Increased_power			= $request->input('Increased_power');
    	$goal->Weight_gain				= $request->input('Weight_gain');
    	$goal->Body_Composition_id		= $body->id;
    	$goal->save();

    	$history = new History();
    	$history->Back_trouble			= $request->input('Back_trouble');
    	$history->Neck_trouble			= $request->input('Neck_trouble');
    	$history->Joint_injury			= $request->input('Joint_injury');
    	$history->Carpal_tunnel			= $request->input('Carpal_tunnel');
    	$history->Bleeding				= $request->input('Bleeding');
    	$history->Enlarged_glands		= $request->input('Enlarged_glands');
    	$history->Rashes				= $request->input('Rashes');
    	$history->Unexplained_lumps		= $request->input('Unexplained_lumps');
    	$history->Chronic_fatigue		= $request->input('Chronic_fatigue');
    	$history->Night_sweats			= $request->input('Night_sweats');
    	$history->Undesired_weight_loss	= $request->input('Undesired_weight_loss');
    	$history->Snoring				= $request->input('Snoring');
    	$history->Difficulty_sleeping	= $request->input('Difficulty_sleeping');
    	$history->Low_blood_sugar		= $request->input('Low_blood_sugar');
    	$history->Goal_id				= $goal->id;
    	$history->save();

    	$aditional = new aditional();
    	$aditional->a1				= $request->input('a1');
    	$aditional->a1_5			= $request->input('a1_5');
    	$aditional->a2				= $request->input('a2');
    	$aditional->a3				= $request->input('a3');
    	$aditional->a4				= $request->input('a4');
    	$aditional->a5				= $request->input('a5');
    	$aditional->a6					= $request->input('a6');
    	$aditional->a6_5			= $request->input('a6_5');
    	$aditional->a7				= $request->input('a7');
    	$aditional->a7_5			= $request->input('a7_5');
    	$aditional->a8				= $request->input('a8');
    	$aditional->a9				= $request->input('a9');
    	$aditional->History_id		= $history->id;
    	$aditional->save();

    	$smoke = new Smoke();
    	$smoke->s1						= $request->input('s1');
    	$smoke->s2						= $request->input('s2');
    	$smoke->s2_age					= $request->input('s2_age');
    	$smoke->s3						= $request->input('s3');
    	$smoke->s3_age					= $request->input('s3_age');
    	$smoke->s4						= $request->input('s4');
    	$smoke->s4_age					= $request->input('s4_age');
    	$smoke->s5						= $request->input('s5');
    	$smoke->s6						= $request->input('s6');
    	$smoke->Aditional_Questions_id	= $aditional->id;
    	$smoke->save();

    	$diet = new DietHis();
    	$diet->d1						= $request->input('d1');
    	$diet->d2						= $request->input('d2');
    	$diet->d3						= $request->input('d3');
    	$diet->d4						= $request->input('d4');
    	$diet->d5						= $request->input('d5');
    	$diet->d6						= $request->input('d6');
    	$diet->d7						= $request->input('d7');
    	$diet->Beef						= $request->input('Beef');
    	$diet->Fish						= $request->input('Fish');
    	$diet->Desserts					= $request->input('Desserts');
    	$diet->Pork						= $request->input('Pork');
    	$diet->Fowl						= $request->input('Fowl');
    	$diet->Fried_foods				= $request->input('Fried_foods');
    	$diet->Milk						= $request->input('Milk');
    	$diet->Buttermilk				= $request->input('Buttermilk');
    	$diet->Skim_milk				= $request->input('Skim_milk');
    	$diet->Low_milk2				= $request->input('Low_milk2');
    	$diet->Low_milk1				= $request->input('Low_milk1');
    	$diet->Coffee					= $request->input('Coffee');
    	$diet->Tea						= $request->input('Tea');
    	$diet->Soda						= $request->input('Soda');
    	$diet->d8						= $request->input('d8');
    	$diet->d9						= $request->input('d9');
    	$diet->d9_5						= $request->input('d9_5');
    	$diet->d10						= $request->input('d10');
    	$diet->d10_5					= $request->input('d10_5');
    	$diet->Smoke_id					= $smoke->id;
    	$diet->save();
    	
    	return redirect('users');
    }

}
