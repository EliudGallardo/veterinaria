<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $titulo_pagina = "Citas";
        $citas = Cita::orderBy('fecha_hora')->get();
        return view('modules.citas.index', compact('titulo_pagina', 'citas'));
    }

    public function create()
    {
        $titulo_pagina = "Nueva Cita";
        return view('modules.citas.create', compact('titulo_pagina'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
            'mascota' => 'required',
            'telefono' => 'required',
            'fecha_hora' => 'required|date',
            'motivo' => 'required',
        ]);

        Cita::create($request->all());

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita registrada correctamente.');
    }
}
