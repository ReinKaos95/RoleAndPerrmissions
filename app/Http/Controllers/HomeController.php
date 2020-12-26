<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //obtener usuario registrado
        $user=Auth::user();
        //obtener rol de usuario
        $rol=$user->roles->implode('name', ',');
        switch ($rol) {
            case 'super-admin':
            $saludo = "hola super-admin";
             return view('home', compact('saludo'));
                break;
                case 'moderator':
                $saludo = "hola moderator";
             return view('home', compact('saludo'));
                break;
                 case 'editor':
              $saludo = "hola editor";
             return view('home', compact('saludo'));
                break;
        }

    }
}
