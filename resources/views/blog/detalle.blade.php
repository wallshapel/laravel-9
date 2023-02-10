@extends('plantillas/app')
@section('titulo')
	{{ $id->titulo }}
@endsection
@section('meta-descripcion')
	{{ $id->descripcion }}	
@endsection
@section('contenido')
    <h1>{{ $id->titulo }}</h1>
    <p>{{ $id->descripcion }}</p>
    <a href="{{ route('blog') }}">Regresar</a>
@endsection