<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use App\User;
use App\Rol;

class UsersController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('users.list', compact('usuarios'));
    }

    public function create()
    {
        $rol = Rol::pluck('Rol', 'id');
        return view('users.register', compact('rol'));
    }

    public function store(Request $request)
    {
        $rol = Rol::pluck('Rol', 'id');
        $pass = Str::random(8, "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890");
        $nombres = $request->input('first_name');
        $paterno = $request->input('middle_name');
        $materno = $request->input('last_name');
        $frac = explode(" ", $materno);
        $finAp = array_pop($frac);        
        $username = $nombres[0].$paterno.$finAp[0];
        
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

        \Session::flash('message', 'User Create successfully');

        $ToMail = $request->input('Email');
        $ToName = $request->input('first_name');

        $data = [
            'username'  => $username,
            'pass'      => $pass,
        ];

        \Mail::send('emails.NewPass', $data, function($message) use ($ToName, $ToMail)
       {
           //remitente
           $message->from(env('MAIL_FROM'), env('MAIL_NAME'));
 
           //asunto
           $message->subject('Access data');
 
           //receptor
           $message->to($ToMail, $ToName);            
       });

        return Redirect('users');
    }

    public function show($Id)
    {
        $id = base64_decode($Id);
        $usuario = User::find($id);        
        return view('users.Profile', compact('usuario'));
    }

    public function edit($Id)
    {
        $id = base64_decode($Id);
        $usuario = User::find($id);
        $rol = Rol::pluck('Rol', 'id');
        return view('users.Edit', compact('usuario', 'rol'));
    }

    public function update(Request $request, $id)
    {
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
        $id = base64_decode($Id);
        $user = User::find($id);
        $user->delete();
        // Para restaurar es con el metodo restore()
        \Session::flash('message', 'User successfully deleted');

        return Redirect('users');
    }
}
