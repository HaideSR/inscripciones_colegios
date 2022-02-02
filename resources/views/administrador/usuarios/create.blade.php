@extends('administrador.index')
@section('content')
<h2>NUEVO ADMINISTRADOR</h2>
<form action="/administrador/usuarios/" method="POST"  class="row g-3">
    @method('post')
    @csrf
    <div class="col-md-2">
        <label for="" class="form-label">Nro Item </label>
        <input name="nitem" type="text" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Nombre </label>
        <input name="nombres" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Apellido paterno</label>
        <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Apellido materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control">
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
    <div class="col-md-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input name="fecha_nacimiento" type="date" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">C.I</label>
        <input name="ci" type="ci" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Rol</label>
        <select name="rol" required class="form-control">
            <option value="DIRECTOR">Director</option>
            <option value="SECRETARIO">Secretario(a)</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Nombre de usuario</label>
        <input name="nombre_usuario" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Contraseña</label>
        <input name="password" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Celular</label>
        <input name="celular" type="text" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input name="correo" type="text" class="form-control">
    </div>
    {{--  --}}
    <div class="col-md-12">
        <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
        <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
    </div>
    {{--  --}}

</form>
@stop
