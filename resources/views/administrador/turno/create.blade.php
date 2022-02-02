@extends('administrador.index')

@section('content')
<h2>NUEVO TURNO</h2>
<form action="/administrador/turno/" method="POST">
    @method('post')
    @csrf
  <div class="mb-6">
    <label for="" class="form-label">Nombre del turno</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
  </div>
    <a href="/administrador/turno" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
@stop
