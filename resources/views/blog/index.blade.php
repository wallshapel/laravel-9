@extends('plantillas/app')
@section('titulo', 'Blog')
@section('meta-descripcion', 'inicio meta blog')
@section('contenido')
    @if(session('estado'))
        <div class="estado">{{ session('estado') }}</div>
    @endif
    <h1>Blog</h1>
    @auth
    <a href="{{ route('blog/nuevo') }}">Crear</a>  {{-- Este elemento estara disponible solo para usuarios autenticados. --}}
    @endauth
    {{-- @dump($posts) Equivale a var_dump() --}}
    @foreach($posts as $post)
        <h2>
            <a href="{{ route('blog/detalle', $post['id']) }}">{{ $post['titulo'] }}</a>
            @auth
            <a href="{{ route('blog/editar', $post['id']) }}">Editar</a>
            <form action="{{ route('eliminar', $post['id']) }}" method="POST">
                @csrf @method('DELETE')
                <input type="submit" value="Eliminar">
            </form>
            @endauth
        </h2>        
    @endforeach
@endsection