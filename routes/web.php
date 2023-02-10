<?php
    use App\Http\Controllers\BlogController; // Necesario para que el controlador 'BlogController' pueda ser invocado en el enrutador.
    use App\Http\Controllers\Autenticacion\RegistroController;
    use App\Http\Controllers\Autenticacion\LoginController;
    use Illuminate\Support\Facades\Route;
    Route::view('/', 'inicio')->name('inicio');
    Route::view('/contacto', 'contacto')->name('contacto');
    Route::get('/blog/index', [BlogController::class, 'index'])->name('blog');
        Route::view('/blog/nuevo', 'blog/nuevo')->name('blog/nuevo');
        Route::post('/blog/guardar', [BlogController::class, 'guardar'])->name('guardar');
        Route::get('/blog/detalle/{id}', [BlogController::class, 'detalle'])->name('blog/detalle');       
        Route::get('/blog/editar/{id}', [BlogController::class, 'editar'])->name('blog/editar')->middleware('auth');
        Route::patch('/blog/actualizar/{id}', [BlogController::class, 'actualizar'])->name('actualizar');       
        Route::delete('/blog/eliminar/{id}', [BlogController::class, 'eliminar'])->name('eliminar');       
    Route::view('/acerca', 'acerca')->name('acerca');
    Route::view('/autenticacion/registro', 'autenticacion/registro')->name('registro');
    Route::post('/autenticacion/registro', [RegistroController::class, 'nuevo'])->name('registro');
    Route::view('/autenticacion/login', 'autenticacion/login')->name('login');
    Route::post('/autenticacion/login', [LoginController::class, 'iniciar'])->name('login');  // Obligatorio que lleve el name->('login');
    Route::post('/autenticacion/logout', [LoginController::class, 'cerrar'])->name('logout');
?>