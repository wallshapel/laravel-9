<?php
    use App\Http\Controllers\BlogController; // Necesario para que el controlador 'BlogController' pueda ser invocado en el enrutador.
    use App\Http\Controllers\Autenticacion\RegistroController;
    use App\Http\Controllers\Autenticacion\LoginController;
    use Illuminate\Support\Facades\Route;
    Route::view('/', 'inicio')->name('inicio');
    Route::prefix('/blog/')->group(function () {  // Todas las rutas dentro de este prefijo comenzarán por /blog/.
        Route::controller(BlogController::class)->group(function () {  // Todas las rutas dentro de este grupo usaran el controlador BlogController::class
            Route::get('index', 'index')->name('blog');   
            Route::post('guardar', 'guardar')->name('guardar');
            Route::get('detalle/{id}', 'detalle')->name('blog/detalle');       
            Route::get('editar/{id}', 'editar')->name('blog/editar')->middleware('auth');
            Route::patch('actualizar/{id}', 'actualizar')->name('actualizar');       
            Route::delete('eliminar/{id}', 'eliminar')->name('eliminar');   
        });        
        Route::view('nuevo', 'blog/nuevo')->name('blog/nuevo');         
    });  
    Route::view('/acerca', 'acerca')->name('acerca');      
    Route::view('/contacto', 'contacto')->name('contacto');
    Route::prefix('/autenticacion/')->group(function () {  // Todas las rutas dentro de este prefijo comenzarán por /autenticacion/.
        Route::view('registro', 'autenticacion/registro')->name('registro');
        Route::post('registro', [RegistroController::class, 'nuevo'])->name('registro');
        Route::view('login', 'autenticacion/login')->name('login');
        Route::controller(LoginController::class)->group(function () {  // Todas las rutas dentro de este grupo usaran el controlador LoginController::class
            Route::post('login', 'iniciar')->name('login');  // Esta ruta es obligatorio que lleve el name->('login');
            Route::post('logout', 'cerrar')->name('logout');
        });
    });    
?>