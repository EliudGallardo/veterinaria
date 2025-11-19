@extends('layouts.main')

@section('titulo_pagina', 'Nueva Cita')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Registrar Cita</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <label>Cliente</label>
                        <input type="text" name="cliente" class="form-control" required>

                        <label class="mt-3">Mascota</label>
                        <input type="text" name="mascota" class="form-control" required>

                        <label class="mt-3">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required>

                        <label class="mt-3">Fecha y hora</label>
                        <input type="datetime-local" name="fecha_hora" class="form-control" required>

                        <label class="mt-3">Motivo</label>
                        <textarea name="motivo" class="form-control" required></textarea>

                        <button class="btn btn-dark mt-4">Guardar Cita</button>
                        <a href="{{ route('citas.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
