
<!--form para el actualizar/editar, la ruta va al web.php y de ahi al metodo del controlador update-->
<form method="POST" action="{{ route('alumnos/update',$producto->id) }}" role="form" enctype="multipart/form-data">

    <!--Le digo que es put, equivalente a @ method('put')-->
    <input type="hidden" name="_method" value="PUT">

    <!--Mando el token de seguridad, equivalente a @ scrf
        Cross-site Request Forgery o en español Falsificación de Petición en Sitios Cruzados-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">



<!--Este formulario es para crear o actualizar registros en la tabla productos -->
<div class="mb3">
    <label for="nombre" class="negrita">Nombre:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="nombre" type="text" id="nombre" value="{{ $alumnos->nombre }}">
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">curso:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="curso" type="text" id="curso" value="{{ $alumnos->curso }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">email:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="email" type="text" id="email" value="{{ $alumnos->email }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Clave:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="clave" type="text" id="clave" value="{{ $alumnos->clave }}">
    </div>
</div>


<br>
</div>

</div>


<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('alunnos.index') }}" class="btn btn-warning">Cancelar</a>

<br>
<br>



</form>