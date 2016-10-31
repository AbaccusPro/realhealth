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

        //los campos que se van creando dinamicamente de acuerdo a la necesidad del usuario deben recorrerse para poder guardarse todos. primero se cuenta el numero de elementos de el primero campo con el metodo count($data['excercise']) y luego en base a ese conteo se recorre el arreglo y se van guardando los campos con la relacion al modelo workout creado en la parte de arriba
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
        //metodo para mostrar los workouts(rutinas) del usuario
        $id = base64_decode($Id);//se decodifica el id
        $usuario = User::find($id);//se encuentra el usuario
        $workouts = $usuario->workouts;//se localizan los workouts en base la relación
        //se retorna la vista con los workouts del usuario
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
        //funcion para encontrar el workout especifico y obtener los detalles
        $id = base64_decode($Id);//se decodifica el id
        $workout = Workout::find($id);//se encuentra el workout
        //se retorna la vista con el workout especifico
        return view('workout.details', compact('workout'));
    }

    public function detailsToPdf($Id){
        //funcion para renderizar el pdf
        $id = base64_decode($Id);//se decodifica el id
        $workout = Workout::find($id);//se busca el workout con el id
        $bol = true;//variable para renderizar solo parte de la vista
        //se lee la vista workout/pdf/details con las variables antes definidas
        $pdf = \PDF::loadView('workout.pdf.details', compact('workout', 'bol'));
        //se renderiza el pdf
        return $pdf->stream('workout.report');
    }

    public function sendPdf($Id){
        //funcion para enviar el pdf
        $id = base64_decode($Id);//se decodifica el id recibido a través de la url
        $workout = Workout::find($id); //se encuentra el pdf
        $email = $workout->user->email;// se localiza el email del usuario que es al que se mandara el pdf
        $name = $workout->user->first_name; //se localiza el nombre del usuario al que pertenece la rutina
        $file = $this->detailsToPdf2($Id);// se genera el pdf a través del metodo detailsToPdf2 creado en la parte final de este controlador.

        //envio de email
        \Mail::send('emails.workout', [], function($message) use ($name, $email, $file)
       {
           //remitente
           $message->from(env('MAIL_FROM'), env('MAIL_NAME'));
 
           //asunto
           $message->subject('your custom workout from realhealth');
 
           //receptor
           $message->to($email, $name);

           //archivo
           $message->attach($file, ['as' => 'workout'.'.PDF']);
       });

        //se borra el archivo pdf que se acaba de crear... con estas dos lineas de codigo
        chmod(public_path().'/pdf/workout.PDF', 0777);
        unlink(public_path().'/pdf/workout.PDF');

        \Session::flash('message', 'Send Workout');//mensaje de confirmación
        return redirect::back();//se redirecciona a la url anterior
    }

///////////////////////////////////////////////////////
    public function detailsToPdf2($Id){
        //funcion para guardar temporalmente el pdf
        $id = base64_decode($Id);// se decodifica el id
        $workout = Workout::find($id);//se busca el workout
        $bol = true;//variable para renderizar solo lo necesario para el pdf
        $pdf = \PDF::loadView('workout.pdf.details', compact('workout', 'bol'));//se renderiza la vista que deseamos mandar como pdf

        if(file_exists(public_path().'/pdf/workout.PDF')) {//si ya existe el archivo se elimina
          chmod(public_path().'/pdf/workout.PDF', 0777);
          unlink(public_path().'/pdf/workout.PDF');
        }

        $pdf->save(public_path().'/pdf/workout.PDF');//se guarda temporalmente el pdf en la carpeta public/pdf/workout.pdf
        return public_path().'/pdf/workout.PDF'; //se retorna el pdf que recien fue guardado
    }

}
