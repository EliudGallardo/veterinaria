@extends('layouts.main')

@section('titulo_pagina', 'Home')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    
                    <a href="{{ route('logout') }}" class="btn btn-dark mb-3">Salir del sistema</a>

                    
                    <a href="{{ route('citas.index') }}" class="btn btn-success mb-3">
                        Administrar Citas
                    </a>

                    <h3 class="mb-3">Administración de usuarios</h3>

                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Editar</th>
                                <th>Cambiar contraseña</th>
                                <th>Activo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($usuarios as $index => $usuario)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>

                                    <td>
                                        <a href="{{ route('usuarios.editar', $usuario->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('usuarios.password', $usuario->id) }}" 
                                           class="btn btn-sm btn-warning">
                                            Cambiar
                                        </a>
                                    </td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input 
                                                class="form-check-input usuario-activo" 
                                                type="checkbox" 
                                                data-id="{{ $usuario->id }}"
                                                {{ $usuario->activo ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.usuario-activo').forEach(checkbox => {
    checkbox.addEventListener('change', function () {

        const userId = this.dataset.id;
        const activo = this.checked ? 1 : 0;

        fetch(`/usuarios/activar/${userId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ activo })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.success) {
                alert("No se pudo actualizar el usuario");
            }
        });
    });
});
</script>

@endsection
