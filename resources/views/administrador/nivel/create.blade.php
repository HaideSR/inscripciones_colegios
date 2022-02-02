@extends('administrador.index')

@section('content')
<h2>NUEVO NIVEL</h2>
<form action="/administrador/nivel/" method="POST">
    @method('post')
    @csrf
  <div class="mb-6">
    <label for="" class="form-label">Nombre del nivel</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
  </div>
    <a href="/administrador/nivel" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
@stop
