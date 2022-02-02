@extends('administrador.index')
@section('content')
<h2>EDITAR A UN PROFESOR</h2>
<form action="/administrador/profesor/{{$profesor->id}}" method="POST"  class="row g-3">
    @method('put')
    @csrf
    <div class="col-md-4">
        <label for="" class="form-label">Nombre del profesor </label>
        <input name="nombres" type="text" class="form-control" value="{{$profesor->nombres}}">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Apellido paterno</label>
        <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" value="{{$profesor->apellido_paterno}}">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Apellido materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control" value="{{$profesor->apellido_materno}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Nro de Item</label>
        <input name="nitem" type="text" class="form-control" value="{{$profesor->nitem}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input name="fecha_nacimiento" type="date" class="form-control" value="{{$profesor->fecha_nacimiento}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">CI</label>
        <input name="ci" type="text" class="form-control" value="{{$profesor->ci}}">
    </div>
    <div class="col-md-2">
        <label class="form-label">Extensión de ci</label>
        <select name="complemento" required class="form-control">
            <option value="NG" {{ $profesor->complemento == 'NG'? 'selected' :'' }}>Ninguno</option>
            <option value="BE" {{ $profesor->complemento == 'BE'? 'selected' :'' }}>Beni</option>
            <option value="CH" {{ $profesor->complemento == 'CH'? 'selected' :'' }}>Chuquisaca</option>
            <option value="CO" {{ $profesor->complemento == 'CO'? 'selected' :'' }}>Cochabamba</option>
            <option value="LP" {{ $profesor->complemento == 'LP'? 'selected' :'' }}>La Paz</option>
            <option value="OR" {{ $profesor->complemento == 'OR'? 'selected' :'' }}>Oruro</option>
            <option value="PA" {{ $profesor->complemento == 'PA'? 'selected' :'' }}>Pando</option>
            <option value="PT" {{ $profesor->complemento == 'PT'? 'selected' :'' }}>Potosi</option>
            <option value="SC" {{ $profesor->complemento == 'SC'? 'selected' :'' }}>Santa Cruz</option>
            <option value="TA" {{ $profesor->complemento == 'TA'? 'selected' :'' }}>Tarija</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Genero</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="m" value="M" {{ $profesor->sexo == 'M'? 'checked=checked' :'' }}>
            <label class="form-check-label" for="m">
              Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="f" value="F" {{ $profesor->sexo == 'F'? 'checked=checked' :'' }}>
            <label class="form-check-label" for="f">
              Femenino
            </label>
        </div>
    </div>

    {{-- s --}}

    <div class="col-md-3">
        <label class="form-label">Departamento</label>
        {{-- <input name="departamento" type="text" class="form-control"> --}}
        <select name="departamento" required class="form-control">
            <option value="">--Selecciona--</option>
            <option value="Beni" {{ $profesor->departamento == 'Beni'? 'selected' :'' }}>Beni</option>
            <option value="Chuquisaca" {{ $profesor->departamento == 'Chuquisaca'? 'selected' :'' }}>Chuquisaca</option>
            <option value="Cochabamba" {{ $profesor->departamento == 'Cochabamba'? 'selected' :'' }}>Cochabamba</option>
            <option value="La Paz" {{ $profesor->departamento == 'La Paz'? 'selected' :'' }}>La Paz</option>
            <option value="Oruro" {{ $profesor->departamento == 'Oruro'? 'selected' :'' }}>Oruro</option>
            <option value="Pando" {{ $profesor->departamento == 'Pando'? 'selected' :'' }}>Pando</option>
            <option value="Potosi" {{ $profesor->departamento == 'Potosi'? 'selected' :'' }}>Potosi</option>
            <option value="Santa Cruz" {{ $profesor->departamento == 'Santa Cruz'? 'selected' :'' }}>Santa Cruz</option>
            <option value="Tarija" {{ $profesor->departamento == 'Tarija'? 'selected' :'' }}>Tarija</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Provincia</label>
        <input name="provincia" type="text" class="form-control" value="{{$profesor->provincia}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Municipio</label>
        <input name="seccion_municipio" type="text" class="form-control" value="{{$profesor->seccion_municipio}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Zona</label>
        <input name="zona_villa" type="text" class="form-control" value="{{$profesor->zona_villa}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Dirección</label>
        <input name="avenida_calle" type="text" class="form-control" value="{{$profesor->avenida_calle}}">
    </div>
    <div class="col-md-2">
        <label class="form-label">N° calle</label>
        <input name="nro_vivienda" type="text" class="form-control" value="{{$profesor->nro_vivienda}}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Celular</label>
        <input name="celular" type="text" class="form-control" value="{{$profesor->celular}}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input name="correo" type="text" class="form-control" value="{{$profesor->correo}}">
    </div>
    {{--  --}}
    <div class="col-md-9">
        <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
        <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
    </div>
    {{--  --}}

</form>
@stop
