@extends('administrador.index')

@section('content')
<h2>NUEVO CURSO</h2>
<form action="/administrador/curso/" method="POST" class="row g-3">
    @method('post')
    @csrf
    <div class="col-md-4">
        <label class="form-label">Seleccionar el nivel:</label>
        <select name="id_nivel" required class="form-control">
            @foreach ($niveles as $nivel)
            <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Seleccionar el Paralelo:</label>
        <select name="id_paralelo" required class="form-control">
            @foreach ($paralelos as $paralelo)
            <option value="{{$paralelo->id}}">{{$paralelo->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Seleccionar el turno:</label>
        <select name="id_turno" required class="form-control">
            @foreach ($turnos as $turno)
            <option value="{{$turno->id}}">{{$turno->nombre}}</option>
            @endforeach
        </select>
    </div>

  <div class="col-md-6">
    <label for="" class="form-label">Nombre del curso:</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
  </div>
  <div>
    <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
@stop
