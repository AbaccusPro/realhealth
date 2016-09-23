<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Workout;
use App\Cardio;
use App\Training;
use App\Diet;

class WorkoutController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('workout.users', compact('usuarios'));
    }

    public function create($Id)
    {
        $id = base64_decode($Id);
        $usuario = User::find($id);
        return view('workout.create', compact('usuario'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();

        $workout = Workout::create([
            'Current_date'  => $data['values']['Current_date'],
            'Start_time'    => $data['values']['Start_time'],
            'End_time'      => $data['values']['End_time'],
            'Scale_weight'  => $data['values']['Scale_weight'],
            'Body_fat'      => $data['values']['Body_fat'],
            'Fitness_goal'  => $data['values']['Fitness_goal'],
            'Sleep_hrs'     => $data['values']['Sleep_hrs'],
            'Name_workout'  => $data['values']['Name_workout'],
            'user_id'       => $id,
            ]);

        for ($i=0; $i < count($data['Excercise']) ; $i++) { 
            $cardio = Cardio::create([
                'Excercise'     => $data['Excercise'][$i],
                'Measure'       => $data['Measure'][$i],
                'Notes'         => $data['Notes'][$i],
                'Workout_id'    => $workout->id,
                ]);
        }

        for ($i=0; $i < count($data['Excercise_T']) ; $i++) { 
            $cardio = Training::create([
                'Excercise'     => $data['Excercise_T'][$i],
                'Weight'        => $data['Weight'][$i],
                'Sets'          => $data['Sets'][$i],
                'Reps'          => $data['Reps'][$i],
                'Rest'          => $data['Rest'][$i],
                'Notes'         => $data['Notes_T'][$i],
                'Workout_id'    => $workout->id,
                ]);
        }

        for ($i=0; $i < count($data['Meal']) ; $i++) { 
            $cardio = Diet::create([
                'Meal'          => $data['Meal'][$i],
                'Fods'          => $data['Fods'][$i],
                'Calories'      => $data['Calories'][$i],
                'Workout_id'    => $workout->id,
                ]);
        }
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
