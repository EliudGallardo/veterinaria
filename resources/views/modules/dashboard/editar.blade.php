@extends('layouts.main')

@section('titulo_pagina', 'Editar Usuario')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Editar Usuario</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('usuarios.actualizar', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" 
                               class="form-control" value="{{ $usuario->name }}">

                        <label class="mt-3" for="email">Correo</label>
                        <input type="email" name="email" id="email" 
                               class="form-control" value="{{ $usuario->email }}">

                        <button class="btn btn-dark mt-4">Guardar cambios</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary mt-4">Cancelar</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
