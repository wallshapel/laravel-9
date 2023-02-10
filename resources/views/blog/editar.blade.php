@extends('plantillas/app')
@section('titulo', 'Editar post')
@section('meta-descripcion', 'Formulario para editar un post')
@section('contenido')
    @if(session('estado'))
        <div class="estado">{{ session('estado') }}</div>
    @endif
    <h1>Editar post</h1>
    <form action="{{ route('actualizar', $id['id']) }}" method="POST">
        @csrf @method('PATCH') {{--  Aquí pudo ir PUT o cualquier otro que no sea GET o POST --}}
        <label for="titulo">Título: <input type="text" name="titulo" value="{{ old('titulo', $id['titulo']) }}">
        @error('titulo')
            <br>
            <span class="errorValidacion">{{ $message }}</span>  {{-- Esta variable está solo disponible dentro de directivas@error/@enderror --}}
        @enderror
        </label>
        <br>
        <label for="descripcion">Descripción: <textarea name="descripcion">{{ old('descripcion', $id['descripcion']) }}</textarea>
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