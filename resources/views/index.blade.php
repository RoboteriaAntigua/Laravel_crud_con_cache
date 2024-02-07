<link rel="stylesheet" href="{{ asset('css/styles.css') }}">


<h1>CRUD básico con cache </h1>
@if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

<p>Al utilizar los metodos update y store se carga la lista en cache, o sea la primera vez no toma info del cache </p>

<a href="{{route('alumnos.listar')}}">Listar sin cache</a><br>

<a href="{{route('alumnos.listarCache')}}"> Listar con cache </a><br>

<a href="{{route('alumnos.listarRenderCache')}}"> Listar pero renderizando la vista entera en cache </a><br>

<a href="{{route('alumnos.actualizarCache')}}">Actualizar cache</a>