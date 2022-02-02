@extends('administrador.index')
@section('content')
<h2>NUEVO ALUMNO</h2>
<form action="/administrador/rude/" method="POST"  class="row g-3">
    @method('post')
    @csrf
    <div class="col-md-4">
        <label for="" class="form-label">Nombre del alumno </label>
        <input id="nombre" name="nombre" type="text" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Apellido paterno</label>
        <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Apellido materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input name="fecha_nacimiento" type="date" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">CI</label>
        <input id="sigla" name="id_ci" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Genero</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="m" value="M">
            <label class="form-check-label" for="m">
              Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="f" value="F">
            <label class="form-check-label" for="f">
              Femenino
            </label>
        </div>
    </div>
    {{-- <div class="col-md-3">
        <label class="form-label">Nro de Item</label>
        <input name="nitem" type="text" class="form-control">
    </div> --}}
    {{-- s --}}
    <div class="col-md-3">
        <label class="form-label">Celular</label>
        <input name="celular" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Dirección</label>
        <input name="direccion" type="text" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">N° calle</label>
        <input name="nro_vivienda" type="text" class="form-control">
    </div>
    {{--  --}}
    <div class="col-md-6">
        <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
        <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
    </div>
    {{--  --}}

</form>
@stop
