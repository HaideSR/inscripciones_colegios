@extends('administrador.index')
@section('content')
<h2>EDITAR A USUARIO</h2>
<form action="/administrador/usuarios/{{$usuario->id}}" method="POST"  class="row g-3">
    @method('put')
    @csrf
    <div class="col-md-2">
        <label for="" class="form-label">Nro Item </label>
        <input name="nitem" type="text" class="form-control" value="{{$usuario->nitem}}">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Nombre </label>
        <input name="nombres" type="text" class="form-control"  value="{{$usuario->nombres}}">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Apellido paterno</label>
        <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" value="{{$usuario->apellido_paterno}}">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Apellido materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control" value="{{$usuario->apellido_materno}}">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Genero</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="m" value="M" {{ $usuario->sexo == 'M'? 'checked=checked' :'' }}>
            <label class="form-check-label" for="m">
              Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="f" value="F" {{ $usuario->sexo == 'F'? 'checked=checked' :'' }}>
            <label class="form-check-label" for="f">
              Femenino
            </label>
        </div>
    </div>
    <div class="col-md-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input name="fecha_nacimiento" type="date" class="form-control" value="{{$usuario->fecha_nacimiento}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">C.I</label>
        <input name="ci" type="ci" class="form-control" value="{{$usuario->ci}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Rol</label>
        <select name="rol" required class="form-control">
            <option value="DIRECTOR" {{ $usuario->rol == 'DIRECTOR'? 'selected' :'' }}>Director</option>
            <option value="SECRETARIO" {{ $usuario->rol == 'SECRETARIO'? 'selected' :'' }}>Secretario(a)</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Nombre de usuario</label>
        <input name="nombre_usuario" type="text" class="form-control" value="{{$usuario->nombre_usuario}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Asignar nueva Contraseña</label>
        <input name="password" type="text" class="form-control" >
    </div>
    <div class="col-md-3">
        <label class="form-label">Celular</label>
        <input name="celular" type="text" class="form-control" value="{{$usuario->celular}}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input name="correo" type="text" class="form-control" value="{{$usuario->correo}}">
    </div>
    <div class="col-md-9">
        <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
        <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
    </div>
    {{--  --}}

</form>
@stop
