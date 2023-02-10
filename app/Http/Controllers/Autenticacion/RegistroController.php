<?php
    namespace App\Http\Controllers\autenticacion;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Validation\Rules; // Necesario para Password::defaults()
    class RegistroController extends Controller {
        public function nuevo(Request $req) {
            $req->validate([
                'name'    => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'  => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
            $usuario = new User;
            $usuario->name = $req->input('name');
            $usuario->email = $req->input('email');
            $usuario->password = bcrypt($req->input('password'));
            $usuario->save();
            return to_route('login')->with('estado', 'cuenta creada');
        }
    }
?>