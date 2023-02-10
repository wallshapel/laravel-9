<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel 9 -- @yield('titulo')</title>
        <meta name="description" content="@yield('meta-descripcion', 'Default meta description')">  {{-- El segundo parámetro en el yield es para que si no se pasa nada, se toma a este argumento por defecto --}}
        <link rel="stylesheet" href="/css/blog.css">
    </head>
    <body>
        @include('parciales/navegacion')
        @auth
        <p>Bienvenido {{ Auth::user()->name }}</p>
        @endauth
        @yield('contenido')    
    </body>
</html>