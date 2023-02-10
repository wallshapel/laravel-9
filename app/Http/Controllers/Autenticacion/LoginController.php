<?php
    namespace App\Http\Controllers\Autenticacion;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;  // Necesario para la función attempt.
    use Illuminate\Validation\ValidationException;
    class LoginController extends Controller {
        public function iniciar(Request $req) {
            $credenciales = $req->validate([  // La variable credenciales solo tendrá en cuenta los campos que se validen con validate().
                'email'     => ['required', 'string', 'email'],
                'password'  => ['required', 'string']
            ]);
            if (Auth::attempt($credenciales, $req->boolean('recuerdame'))) {  // Verifica si el usuario y contraseña son correctos contra la DB. compara la contraseña encriptada automáticamente. El segundo parámetro es un booleano que inidica si se recuerda la sessión o no.
                 $req->session()->regenerate();
                 return redirect()->intended()->with('estado', 'has iniciado sesión.');
            } else {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed')
                ]);
            }        
        }
        public function cerrar(Request $req) {
            Auth::guard('web')->logout();
            $req->session()->invalidate();  // destruye la sessión.
            $req->session()->regenerateToken();  // Regenera el token CSRF
            return to_route('login');
        }
    }
?>