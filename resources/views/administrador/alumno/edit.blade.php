@section('content')
<h2>EDITAR ALUMNO</h2>
<form action="/administrador/materia/{{$materia->id}}" method="POST">
    @method('put')
    @csrf
  <div class="mb-6">
    <label for="" class="form-label">Nombre de Materia </label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$materia->nombre}}">
  </div>
  <div class="mb-6">
    <label for="" class="form-label">Sigla de la materia </label>
    <input id="sigla" name="sigla" type="text" class="form-control" tabindex="2" value="{{$materia->sigla}}">
  </div><br>
  <div>
    <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
@stop
