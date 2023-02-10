@extends('plantillas/app')
@section('titulo', 'Login')
@section('meta-descripcion', 'inicio meta Login')
@section('contenido')
    <h1>Login</h1>
    <form action="{{ 'login' }}" method="POST">
    	@csrf
        <br>
        <label for="email">Email: <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus>
        @error('email')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
        <label for="password">Contraseña: <input type="password" id="password" name="password" value="{{ old('password') }}">
        @error('password')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
        <label for="recuerdame"><input type="checkbox" id="recuerdame" name="recuerdame">Recuérdame</label>
        <br>
        <a href="{{ route('registro') }}">registro</a>
        <br>
    	<input type="submit" value="Entrar">
    </form>
@endsection