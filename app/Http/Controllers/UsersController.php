<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use App\User;
use App\Rol;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //este controlador maneja la misma logica que el controlador de usuarios del proyecto de electoral

    public function index()
    {
        //se obtienen todos los usuarios y se envian a la vista users/list
        $usuarios = User::all();
        return view('users.list', compact('usuarios'));
    }

    public function create()
    {
        //el metodo pluck es para sutituir el metodo lists... la variable rol es un arreglo con toda la lista del modelo rol, esta variable sirve para llenar el combo d ela vista.
        $rol = Rol::pluck('Rol', 'id');
        return view('users.register', compact('rol'));
    }

    public function store(Request $request)
    {
        //logica de creacion de usuario es la misma logica que se usa en el proyecto de electoral de dropbox

        //varaibles a utilizar
        $rol = Rol::pluck('Rol', 'id');
        $pass = Str::random(8, "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890");
        $nombres = $request->input('first_name');
        $paterno = $request->input('middle_name');
        $materno = $request->input('last_name');
        $frac = explode(" ", $materno);
        $finAp = array_pop($frac);        
        $username = $nombres[0].$paterno.$finAp[0];
        
        //se crea el usuario
        $user  = User::create([
            'first_name' => $nombres,
            'middle_name' => $paterno,
            'last_name' => $materno,
            'username' => $username,
            'email' => $request->input('Email'),
            'password' => bcrypt($pass),
            'rol_id' => $request->input('rol'),
            'image_user_id' => 1
            ]);

        //mensaje de ocnfirmacion
        \Session::flash('message', 'User Create successfully');

        //variables para enviar el email
        $ToMail = $request->input('Email');
        $ToName = $request->input('first_name');

        $data = [
            'username'  => $username,
            'pass'      => $pass,
        ];

        //envio de email
        \Mail::send('emails.NewPass', $data, function($message) use ($ToName, $ToMail)
       {
           //remitente
           $message->from(env('MAIL_FROM'), env('MAIL_NAME'));
 
           //asunto
           $message->subject('Access data');
 
           //receptor
           $message->to($ToMail, $ToName);            
       });

        //redireciona a la ruta users
        return Redirect('users');
    }

    public function show($Id)
    {
        // encuentra al usuario mediante al id y manda los datos a la vista
        $id = base64_decode($Id);
        $usuario = User::find($id);        
        return view('users.Profile', compact('usuario'));
    }

    public function edit($Id)
    {
        //encuentra al usuario con el id y luego manda al formulario con los datos correspondientes
        $id = base64_decode($Id);
        $usuario = User::find($id);
        $rol = Rol::pluck('Rol', 'id');
        return view('users.Edit', compact('usuario', 'rol'));
    }

    public function update(Request $request, $id)
    {
        // se localiza al usuario mediante el id y se hace la respectiva actualizacion con los datos enviados en el formulario
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('Email');
        $user->username = $request->input('Username');
        $user->rol_id = $request->input('Rol');
        $user->save();

        \Session::flash('message', 'User updated successfully');

        return Redirect('users');
    }

    public function destroy($Id)
    {
        //metodo para eliminar al usuario
        $id = base64_decode($Id);
        $user = User::find($id);
        $user->delete();
        // Para restaurar es con el metodo restore()
        \Session::flash('message', 'User successfully deleted');

        return Redirect('users');
    }
}
