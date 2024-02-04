

<div class="container-fluid">
<a href="{{ route('alumnos.create') }}" class="btn btn-success mt-4 ml-3"> Agregar Alumno</a><br><br>

@if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
@endif



<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>curso</th>
        <th>Email</th>
        <th>clave</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumnos as $alum) <tr>
        <td class="v-align-middle">{{$alum->nombre}}</td>
        <td class="v-align-middle">{{$alum->curso}} </td>
        <td class="v-align-middle">{{$alum->email}}</td>
        <td class="v-align-middle">
          <img src="http//127.0.0.1:8000/storage/app/public/paquete1.png" width="30" class="img-responsive">
        </td>
        <td class="v-align-middle">
          <form action="{{ route('alumnos.destroy',$alum->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a href="{{ route('alumnos.show',$alum->id) }}" class="btn btn-dark">Detalles</a>
            <a href="{{ route('alumnos.edit',$alum->id) }}" class="btn btn-primary">Editar</a>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
     </tbody>
  </table>
  <script type="text/javascript">
    function confirmarEliminar(){
        var x= confirm("Estas seguro de borrarlo?");
        if(x){
            return true;}
        else
            {return false;}
    }
    </script>
</div>