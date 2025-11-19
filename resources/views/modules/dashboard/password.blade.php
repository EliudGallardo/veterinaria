@extends('layouts.main')

@section('contenido')
<div class="container mt-4">

    <h2>Cambiar contraseña a: {{ $usuario->name }}</h2>

    {{-- Mostrar errores --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.password.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="password">Nueva contraseña</label>
        <input type="password" name="password" class="form-control" required>

        <label for="password_confirmation" class="mt-3">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" required>

        <button type="submit" class="btn btn-dark mt-3">Actualizar contraseña</button>
    </form>

</div>
@endsection
