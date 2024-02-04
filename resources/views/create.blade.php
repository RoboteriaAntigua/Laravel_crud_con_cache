
<form method="POST" action="{{ route('alumnos.store') }}" role="form" enctype="multipart/form-data">
    
    @method('POST')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
<div class="mb3">
    <label for="nombre" class="negrita">Nombre:</label>
    <div>
        <input class="form-control" placeholder="Maria que se yo" required="required" name="nombre" type="text" id="nombre" >
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">Curso:</label>
    <div>
        <input class="form-control" placeholder="Electricidad" required="required" name="curso" type="text" id="curso" >
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Email:</label>
    <div>
        <input class="form-control" placeholder="lala@example.com" required="required" name="email" type="text" id="email" >
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Clave:</label>
    <div>
        <input class="form-control" placeholder="40" required="required"  type="text" name="clave" id="clave" >
    </div>
</div>

<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('alumnos.index') }}" class="btn btn-warning">Cancelar</a>
  </form>