<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use App\User;
use App\Rol;
use App\Module;
use App\NutM;
use App\ImageUser;

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
        return view('users.Register', compact('rol'));
    }

    public function store(Request $request)
    {
        //logica de creacion de usuario es la misma logica que se usa en el proyecto de electoral de dropbox

        $image = new ImageUser();

        $file = $request->file('image');

        //hace la evaluacion para corroborar que el archivo exista
        if($file != null){
            //se obtienen los datos que se van a llenar en la tabla
            $nombre = $file->getClientOriginalName(); //el nombre del archivo
            $mime = $file->getClientOriginalExtension();//la extension del archivo
            $tamaño = $file->getClientSize()/1024;//el tamaño
            $file->move(public_path().'/images/', $nombre);//el archivo en si el cual movemos a la carpeta publica de laravel quedando en al carpeta /public/images/nombre del archivo.

        }

        //una vezestando el archivo en la ruta publica se habre el archivo con el metodo php fopen, se reccorre y se cierra, basicamente este pedazo de codigo es el que hace la magia para convertir el archivo a binario
        $imagen = public_path().'/images/'.$nombre;
        $fp = fopen($imagen, 'r');
        if($fp){
            $datos = fread($fp, filesize($imagen));
            fclose($fp);
        }

        //y aqui es donde finalmente se guarda el archivo en la base de datos, cada dato a su respectivo campo de la tabla, con ayuda del objeto que se creo al principio del metodo.
        $image->Name  = $nombre; 
        $image->Size  = $tamaño;
        $image->Mime    = $mime;
        $image->File = $datos;
        $image->save();
        $image_id = $image->id;

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
            'image_user_id' => $image_id
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

        chmod(public_path().'/images/'.$nombre, 0777);
        unlink(public_path().'/images/'.$nombre);

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
        $modules = Module::all();
        return view('users.Edit', compact('usuario', 'rol', 'modules'));
    }

    public function update(Request $request, $id)
    {
        // se localiza al usuario mediante el id y se hace la respectiva actualizacion con los datos enviados en el formulario

         // el metodo de editar usuario contiene practicamente la misma logica que el guardado de los mismos, con unos ligeros cambios.
        $user = User::find($id);
        $image = ImageUser::find($user->image->id);  
        $file = $request->file('image');

        // aqui si el archivo no se ha cambiado pasa directamente solo a hacer update a los campos sencillos, de locontrario hace el update de los campos y tambien de la imagen
        if($file != null){
           
            $nombre = $file->getClientOriginalName();
            $mime = $file->getClientOriginalExtension();
            $tamaño = $file->getClientSize()/1024;
            $file->move(public_path().'/images/', $nombre);        
        
            $imagen = public_path().'/images/'.$nombre;
            $fp = fopen($imagen, 'r');
            if($fp){
                $datos = fread($fp, filesize($imagen));
                fclose($fp);
            }

            $image->Name  = $nombre; 
            $image->Size  = $tamaño;
            $image->Mime    = $mime;
            $image->File = $datos;
            $image->save();
            $image_id = $image->id;

            $modules = $request->input('module');
            for ($i=0;$i<2;$i++) {
                if (!isset($modules[$i])) {
                    $modules[$i] = 'off';
                }
            }
            
            
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('Email');
            $user->username = $request->input('Username');
            $user->rol_id = $request->input('Rol');
            $user->image_user_id = $image_id;
            $user->modules()->detach();
            for ($i=0;$i<2;$i++) {
                if ($modules[$i] == 'off') {
                    //$user->modules()->detach($i+1);
                    switch ($i+1) {
                         case 1:
                             $user->nutrition = 0;
                             break;
                         case 2:
                             $user->therapy = 0;
                             break;
                     } 
                }else{
                    $user->modules()->attach($i+1);
                    switch ($i+1) {
                         case 1:
                             $user->nutrition = 1;
                             break;
                         case 2:
                             $user->therapy = 1;
                             break;
                     }
                }
            }
            $user->save();

            chmod(public_path().'/images/'.$nombre, 0777);
            unlink(public_path().'/images/'.$nombre);

        }else{

            $modules = $request->input('module');
            for ($i=0;$i<2;$i++) {
                if (!isset($modules[$i])) {
                    $modules[$i] = 'off';
                }
            }
            
            $user = User::find($id);
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('Email');
            $user->username = $request->input('Username');
            $user->rol_id = $request->input('Rol');
            $user->modules()->detach();
            for ($i=0;$i<2;$i++) {
                if ($modules[$i] == 'off') {
                    //$user->modules()->detach($i+1);
                    switch ($i+1) {
                         case 1:
                             $user->nutrition = 0;
                             break;
                         case 2:
                             $user->therapy = 0;
                             break;
                     } 
                }else{
                    $user->modules()->attach($i+1);
                    switch ($i+1) {
                         case 1:
                             $user->nutrition = 1;
                             break;
                         case 2:
                             $user->therapy = 1;
                             break;
                     }
                }
            }
            $user->save();
        }    
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
