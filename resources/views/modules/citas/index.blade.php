@extends('layouts.main')

@section('titulo_pagina', 'Citas')

@section('contenido')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">

            
            <a href="{{ route('home') }}" class="btn btn-primary mb-3">Volver a Home</a>

            
            <a href="{{ route('citas.create') }}" class="btn btn-dark mb-3">Nueva Cita</a>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Mascota</th>
                        <th>Teléfono</th>
                        <th>Fecha & Hora</th>
                        <th>Motivo</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($citas as $i => $cita)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $cita->cliente }}</td>
                        <td>{{ $cita->mascota }}</td>
                        <td>{{ $cita->telefono }}</td>
                        <td>{{ $cita->fecha_hora }}</td>
                        <td>{{ $cita->motivo }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
