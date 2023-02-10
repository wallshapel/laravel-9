<nav>
	<ul>
	    <li><a href="{{ route('inicio') }}">Inicio</a></li>
	    <li><a href="{{ route('blog') }}">Blog</a></li>
	    <li><a href="{{ route('acerca') }}">Acerca</a></li>
	    <li><a href="{{ route('contacto') }}">Contacto</a></li>
	    @guest  {{-- Esta directiva muestra los elementos que contiene solo a usuaios no autenticados --}}
	    <li><a href="{{ route('login') }}">Login</a></li>
	    <li><a href="{{ route('registro') }}">Regístrate</a></li>
	    @else
	    <form action="{{ route('logout') }}" method="POST">
	    	@csrf
	    	<input type="submit" value="Cerrar sesión">
	    </form>
	    @endguest
	</ul>
</nav>