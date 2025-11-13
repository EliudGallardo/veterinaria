<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function login(){
        $titulo_pagina ='Login de usuario';
        return view('modules.login.index', compact('titulo_pagina'));
    }

    public function registro(){
        $titulo_pagina ='Registro de usuario';
        return view('modules.login.registro', compact('titulo_pagina'));
    }

    public function registrar(Request $request){
        $titulo_pagina ='Registro de usuario';
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->save();
        return to_route('login');
    }

    public function logear(Request $request){
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales)){
            return to_route('home');
        }else{
            return to_route('login');
        }
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }


    public function home(){
    $titulo_pagina = 'Dashboard';
    return view('modules.dashboard.home', compact('titulo_pagina'));
}
}