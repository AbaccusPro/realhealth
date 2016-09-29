<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // estas cuatro propiedades son para poder asignarle valores a variables que ya tiene el framework por default... en laravel 5.3 hay unas que ya no parecen funcionar
    protected $username = 'username'; // esta sirve pero hay que reescribir el metodo username
    protected $redirectAfterLogout = 'login'; // esta ya no sirve al parecer
    protected $loginPath = 'login'; //define la ruta del login
    protected $redirectTo = 'assign/workout';// despues del login redirige a la ruta de assign/workout

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //este metodo se reescribe para que funcione la variable $username que se definio arriba
    public function username(){
        return 'username';
    }
}
