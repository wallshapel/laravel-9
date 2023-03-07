<?php 
	namespace App\Http\Controllers;
	use App\Models\Blog;
	use Illuminate\Http\Request;  // Necesario para acceder a los valores enviados vía POST.
	class BlogController {
		public function __construc() {
			$this->middleware('auth', ['except' => ['index', 'detalle']]); // Usuarios no autenticados no tendrán acceso a los métodos de esta clase, excepto a index y detalle. Serán redireccionados al login automáticamente.
		}
		public function index() {
			$posts = Blog::get();  // El método get está es intrínseco del modelo Blog y devuelve toda la tabla asociada.
			return view('blog/index', compact('posts'));
		}
		public function detalle(Blog $id) { // la variable id es de tipo Blog
			//$detalles = Blog::find($id); // si id es declarado de tipo Blog, esta línea ya no es necesaria.
			//return $id; // Retorna una JSON con el registro que coincida con id.
			return view('blog/detalle', compact('id'));
		}
		public function guardar(Request $req) {
			$req->validate([
				'titulo' => 'required',
				'descripcion' => 'required'
			]);
			$post = new Blog;
			$post->titulo = $req->input('titulo');
			$post->descripcion = $req->input('descripcion');
			$post->save();
			return to_route('blog/nuevo')->with('estado', 'post creado.'); // equivale a return redirect->route('blog/nuevo');
			// return $req; // Retorna un JSON con los campos del formulario.
		}
		public function editar(Blog $id) {
			return view('blog/editar', compact('id'));
		}		
		public function actualizar(Request $req, Blog $id) {
			$req->validate([
				'titulo' => 'required',
				'descripcion' => 'required'
			]);
			$id->titulo = $req->input('titulo');
			$id->descripcion = $req->input('descripcion');
			$id->save();
			return to_route('blog/editar', $id)->with('estado', 'post actualizado.'); // to_route equivale a return redirect->route('blog/nuevo');
			// return $req; // Retorna un JSON con los campos del formulario.
		}
		public function eliminar(Blog $id) {
			$id->delete();
			$posts = Blog::get();
			return to_route('blog', compact('posts'))->with('estado', 'post eliminado.');
		}
	}
?>