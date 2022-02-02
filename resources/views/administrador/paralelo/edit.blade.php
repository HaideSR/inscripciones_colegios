@extends('administrador.index')

@section('content')
<h2>EDITAR PARALELO</h2>
<form action="/administrador/paralelo/{{$paralelo->id}}" method="POST">
    @method('put')
    @csrf
  <div class="mb-6">
    <label for="" class="form-label">Nombre del Paralelo </label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$paralelo->nombre}}">
  </div>
    <a href="/administrador/paralelo" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
@stop
