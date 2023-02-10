@extends('plantillas/app')
@section('titulo', 'Crear nuevo post')
@section('meta-descripcion', 'Formulario para crear un nuevo post')
@section('contenido')
    @if(session('estado'))
        <div class="estado">{{ session('estado') }}</div>
    @endif
    <h1>Crear nuevo post</h1>
    <form action="{{ 'guardar' }}" method="POST">
    	@csrf
    	<label for="titulo">Título: <input type="text" name="titulo" value="{{ old('titulo') }}">
        @error('titulo')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
    	<label for="descripcion">Descripción: <textarea name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <br>
            <span class="errorValidacion">{{ $message }}</span>
        @enderror
        </label>
        <br>
    	<input type="submit" value="Guardar">
    </form>
    <br>
    <a href="{{ route('blog') }}">Regresar</a>
@endsection