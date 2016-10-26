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
           
           //se obtienen los datos de el archvio que se recibio en el romulario
            $nombre = $file->getClientOriginalName();
            $mime = $file->getClientOriginalExtension();
            $tamaño = $file->getClientSize()/1024;
            //se mueve a la carpeta public/images/Nombre-Archivo del proyecto de laravel... en la carpeta public de laravel es donde se debe de alojar todo lo referente a media, incluso los archivos css, js y multimedia como fotos, archivos pdf etc.
            $file->move(public_path().'/images/', $nombre);        
        
            //con este codigo es que se manipula la imagen para pasar los datos a binario y asi poder guardarla en la base de datos
            $imagen = public_path().'/images/'.$nombre;
            $fp = fopen($imagen, 'r');
            if($fp){
                $datos = fread($fp, filesize($imagen));
                fclose($fp);
            }

            //aqui se asigna a los atributos del modelo cada elemento, incluyendo el archivo que ya esta en binario
            $image->Name  = $nombre; 
            $image->Size  = $tamaño;
            $image->Mime    = $mime;
            $image->File = $datos;
            $image->save();
            $image_id = $image->id;

            /*este pequeño codigo es para poder manipular la seccion de modulos
            basicamente se recorre ele arreglo que esta definido en el formulario llamado modules[], que en este caso para efectos de prueba solo tiene 2 elementos (nutrition, therapy)
            */
            $modules = $request->input('module');
            for ($i=0;$i<2;$i++) {
                //ya que se reccorre el arreglo si la variable si un elemento del arreglo no esta definido se le coloca el string off, el cual nos hara referencia para saber si esta o no seleccionado.
                if (!isset($modules[$i])) {
                    $modules[$i] = 'off';
                }
            }
            
            //luego se guardan los datos normalmente haciendo las referencias alos atributos y asignandoles los campos obtenidos del formulario 
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('Email');
            $user->username = $request->input('Username');
            $user->rol_id = $request->input('Rol');
            $user->image_user_id = $image_id;
            $user->modules()->detach();
            /*como es una actualización de datos y los elementos del usuario se pueden estar o no actualizando de acuerdo a los modulos que haya pagado... primero se deshace la relacion, ya que es una relacion muchos a muchos entre modulos y usuarios no se puede hacer un update como tal, entonces con el metodo:
            $user->modules()->detach();
            estamos diciendo que deshaga toda relacion que tenga el usuario con cualquier modulo, despues de esto los podemos asignar de acuerdo al update que se haga en el formulario con el siguiente codigo
            */
            for ($i=0;$i<2;$i++) {
                //se recorre el arreglo y luego se compara si es igual a off entonces va a entrar al switch y dependiendo el elemento del arreglo es que se apaga el modulo.
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
                    /*si no es igual a off entonce significa que tiene asignado el modulo, por tanto con el metodo:
                    $user->modules()->attach($i+1);
                    es donde se establece la relacion entre el usuario y el modulo, posterior a esto entonces es que se enciende y se le asigna a ese atributo el numero 1 que significa que esta encendido.
                    */
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
            //se graba todos los movimientos anteriores
            $user->save();

            //se eliminan las imagenes que grabaron temporalmente en en la carpeta y listopublica de laravel
            chmod(public_path().'/images/'.$nombre, 0777);
            unlink(public_path().'/images/'.$nombre);

        }else{

            //en caso de que no se dese hacer update a la imagen del usuario, es entonces que solo se manipulan los demas datos, de la misma manera que si se hiciera el cambio de imagen, solo que aqui se omite la manipulacion del archivo.
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
        //se manda el mensaje de actualización 
        \Session::flash('message', 'User updated successfully');

        return Redirect('users');
    }

    public function destroy($Id)
    {
        //metodo para eliminar al usuario
        //se decodifica el id, se hace la busqueda y se borra
        $id = base64_decode($Id);
        $user = User::find($id);
        $user->delete();
        // Para restaurar es con el metodo restore()
        //mensaje de confirmación
        \Session::flash('message', 'User successfully deleted');
        //se redirecciona a la ruta de usuarios
        return Redirect('users');
    }
}
