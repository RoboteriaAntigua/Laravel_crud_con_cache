<div class="panel-body">

    <!--Si redirigimos de algun lado con un mensaje, lo mostramos aqui-->
    @if(Session::has('message'))
      <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif

      <p class="h5">Nombre:</p>
      <p class="h6 mb-3">{{ $alumno->nombre }}</p>

      <p class="h5">curso:</p>
      <p class="h6 mb-3">{{ $alumno->curso }}</p>

      <p class="h5">email:</p>
      <p class="h6 mb-3">{{ $alumno->email }}</p>

      <p class="h5">Foto:</p>
      <img src="http//127.0.0.1:8000/storage/app/public/paquete1.bmp" class="img-fluid" width="20%">

    <a href="{{route('alumnos.index')}}">Listo</a>
</div>