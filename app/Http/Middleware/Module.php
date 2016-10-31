<?php

namespace App\Http\Middleware;

use Closure;
//namespaces de clases que se utilizaran para el middleware.. casi siempre estas son de cajon y hay que agregarlas
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class Module
{
    protected $auth;// se crea la variable que hara referencia al usuario en sesión

    //en el constructor se usa la clase guard la cual se le asigna a la variable auth mediante la inyección de dependencias..
    public function __construct(Guard $auth){
        $this->auth = $auth;//se iguala el usuario en sesion a la variable $auth
    }

    public function handle($request, Closure $next)
    {
        //aqui se pone la lógica que hará la restriccion dentro de niestra aplicación.
        
        //se evalua que el usuaario en sesion en su atributo de nutricion si es diferente a uno, es decir esta apagado, entonces se redirecciona a la pagina de usuarios... lo cual restringe la vista en base a si tiene asignado el modulo o no...
        if($this->auth->user()->nutrition != 1){
            return redirect('users');
        }

        //se pasa al siguiente middleware
        return $next($request);
    }
}
