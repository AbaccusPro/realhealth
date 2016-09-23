<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $username = 'username';
    protected $redirectAfterLogout = 'login';
    protected $loginPath = 'login';
    protected $redirectTo = 'assign/workout';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username(){
        return 'username';
    }
}
