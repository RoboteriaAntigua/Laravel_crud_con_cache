<!--form para el actualizar/editar, la ruta va al web.php y de ahi al metodo del controlador update-->
<form method="POST" action="{{ route('alumnos.update',$alumno->id) }}" role="form" enctype="multipart/form-data">

    <!--Le digo que es put, equivalente a @ method('put')-->
    <input type="hidden" name="_method" value="PUT">

    <!--Mando el token de seguridad, equivalente a @ scrf
        Cross-site Request Forgery o en español Falsificación de Petición en Sitios Cruzados-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

   <!--Este formulario es para crear o actualizar registros en la tabla alumnos -->
<div class="mb3">
    <label for="nombre" class="negrita">Nombre:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="nombre" type="text" id="nombre" value="{{ $alumno->nombre }}">
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">Curso:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="curso" type="text" id="curso" value="{{ $alumno->curso }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Email:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="email" type="text" id="email" value="{{ $alumno->email }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Clave:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="clave" type="text" id="clave" value="{{ $alumno->clave }}">
    </div>
</div>


<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('alumnos.index') }}" class="btn btn-warning">Cancelar</a>

<br>
<br>

</form>


