<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Workout;
use App\Cardio;
use App\Training;
use App\Diet;
use Illuminate\Support\Facades\Redirect;

class WorkoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['detailsToPdf']]);
    }

    public function index()
    {
        //aqui obtenemos a todos los usuarios y se envian a la vista de workout/users
        $usuarios = User::all();
        return view('workout.users', compact('usuarios'));
    }

    public function create($Id)
    {
        //para asignarle el workout al usuario, se encuentra mediante el id y nos envia al formulario de asignacion
        $id = base64_decode($Id);
        $usuario = User::find($id);
        return view('workout.create', compact('usuario'));
    }

    public function store(Request $request, $id)
    {
        // aqui se guarda el workout mediante el formulario...
        //primero con request->all() se obtienen todos los campos del formulario
        $data = $request->all();

        //los campos que no son dinamicos se crean de manera normal, con el metodo create
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

        //los campos que se van creando dinamicamente de acuerdo a la necesidad del usuario deben recorrerse para poder guardarse todos. primero se cuenta el numero de elementos de el primero campo con el metodo coun($data['excercise']) y luego en base a ese conteo se recorre el arreglo y se van guardando los campos con la relacion al modelo workout creado en la parte de arriba
        for ($i=0; $i < count($data['Excercise']) ; $i++) { 
            $cardio = Cardio::create([
                'Excercise'     => $data['Excercise'][$i],
                'Measure'       => $data['Measure'][$i],
                'Notes'         => $data['Notes'][$i],
                'Workout_id'    => $workout->id,
                ]);
        }

        // se hace lo mismo con los otros dos campos dinamicos
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

        //se redirecciona a la ruta assign/workout despues de grabar
        return redirect('assign/workout');
    }

    public function show($Id)
    {
        $id = base64_decode($Id);
        $usuario = User::find($id);
        $workouts = $usuario->workouts;
        return view('workout.workouts', compact('workouts'));
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

    public function details($Id){
        $id = base64_decode($Id);
        $workout = Workout::find($id);
        return view('workout.details', compact('workout'));
    }

    public function detailsToPdf($Id){
        $id = base64_decode($Id);
        $workout = Workout::find($id);
        $bol = true;
        $pdf = \PDF::loadView('workout.pdf.details', compact('workout', 'bol'));
        return $pdf->stream('workout.report');
    }

    public function sendPdf($Id){
        
        $id = base64_decode($Id);
        $workout = Workout::find($id);
        $email = $workout->user->email;
        $name = $workout->user->first_name;
        $file = $this->detailsToPdf2($Id);
        //url('pdf/workout', $workout->id);
        //app('App\Http\Controllers\WorkoutController')->detailsToPdf($Id);
        //dd($file);

        //envio de email
        \Mail::send('emails.workout', [], function($message) use ($name, $email, $file)
       {
           //remitente
           $message->from(env('MAIL_FROM'), env('MAIL_NAME'));
 
           //asunto
           $message->subject('your custom workout from realhealth');
 
           //receptor
           $message->to('mowex@hotmail.com', $name);

           //archivo
           $message->attach($file, ['as' => 'workout'.'.PDF']);
       });

        chmod(public_path().'/pdf/workout.report', 0777);
        unlink(public_path().'/pdf/workout.report');

        \Session::flash('message', 'Send Workout');
        return redirect::back();
    }

///////////////////////////////////////////////////////
    public function detailsToPdf2($Id){
        $id = base64_decode($Id);
        $workout = Workout::find($id);
        $bol = true;
        $pdf = \PDF::loadView('workout.pdf.details', compact('workout', 'bol'));
        $pdf->save(public_path().'/pdf/workout.report');
        return public_path().'/pdf/workout.report';
    }

}
