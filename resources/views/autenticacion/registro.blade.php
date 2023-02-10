@extends('plantillas/app')
@section('titulo', 'Registro')
@section('meta-descripcion', 'inicio meta Registro')
@section('contenido')
    <h1>Registro</h1>
    <form action="{{ 'registro' }}" method="POST">
    	@csrf
    	<label for="name">Nombre: <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus>
        @error('name')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
        <label for="email">Email: <input type="email" id="email" name="email" value="{{ old('email') }}">
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
        <label for="password_confirmation">Confirmar contraseña: <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
        <a href="{{ route('login') }}">login</a>
        <br>
    	<input type="submit" value="Guardar">
    </form>
@endsection