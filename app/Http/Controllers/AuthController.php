<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
     
    public function login()
    {
        $titulo_pagina = 'Login de usuario';
        return view('modules.login.index', compact('titulo_pagina'));
    }

    
    
    public function registro()
    {
        $titulo_pagina = 'Registro de usuario';
        return view('modules.login.registro', compact('titulo_pagina'));
    }

    public function registrar(Request $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->activo = 1; 
        $item->save();

        return to_route('login');
    }

    
    
    
    public function logear(Request $request)
    {
        $credenciales = $request->only('email', 'password');
        $credenciales['activo'] = 1; 

        if (Auth::attempt($credenciales)) {
            return to_route('home');
        } else {
            return back()->with('error', 'Usuario inactivo o credenciales incorrectas.');
        }
    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    
    public function home()
    {
        $titulo_pagina = 'Dashboard';
        $usuarios = User::all(); // Todos los usuarios
        return view('modules.dashboard.home', compact('titulo_pagina', 'usuarios'));
    }

    
    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $titulo_pagina = "Editar usuario";

        return view('modules.dashboard.editar', compact('usuario', 'titulo_pagina'));
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        $usuario->save();

        return redirect()->route('home')->with('success', 'Usuario actualizado correctamente.');
    }

    
    public function cambiarPassword($id)
    {
        $usuario = User::findOrFail($id);
        $titulo_pagina = "Cambiar contraseña";

        return view('modules.dashboard.password', compact('usuario', 'titulo_pagina'));
    }

    public function actualizarPassword(Request $request, $id)
    {
    $request->validate([
        'password' => 'required|confirmed'
    ]);

    $usuario = User::findOrFail($id);
    $usuario->password = Hash::make($request->password);
    $usuario->save();

    
    if (Auth::id() == $usuario->id) {
        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with('success', 'Contraseña actualizada. Ingresa con la nueva contraseña.');
    }

   
    return redirect()->route('home')->with('success', 'Contraseña actualizada correctamente.');
    }



    
    public function activarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->activo = $request->input('activo');

        $usuario->save();

        return response()->json(['success' => true]);
    }
}
