@extends('administrador.index')
@section('content')
<h2>NUEVO PROFESOR</h2>
<form action="/administrador/profesor/" method="POST"  class="row g-3">
    @method('post')
    @csrf
    <div class="col-md-4">
        <label for="" class="form-label">Nombre del profesor </label>
        <input name="nombres" type="text" class="form-control">
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
        <label class="form-label">Nro de Item</label>
        <input name="nitem" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input name="fecha_nacimiento" type="date" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">CI</label>
        <input name="ci" type="text" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">Extensión de ci</label>
        <select name="complemento" required class="form-control">
            <option value="NG">NG</option>
            <option value="BE">BE</option>
            <option value="CH">CH</option>
            <option value="CO">CO</option>
            <option value="LP">LP</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="PT">PT</option>
            <option value="SC">SC</option>
            <option value="TA">TA</option>
        </select>
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

    {{-- s --}}

    <div class="col-md-3">
        <label class="form-label">Departamento</label>
        {{-- <input name="departamento" type="text" class="form-control"> --}}
        <select name="departamento" required class="form-control">
            <option value="">--Selecciona--</option>
            <option value="Beni">Beni</option>
            <option value="Chuquisaca">Chuquisaca</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="La Paz">La Paz</option>
            <option value="Oruro">Oruro</option>
            <option value="Pando">Pando</option>
            <option value="Potosi">Potosi</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Tarija">Tarija</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Provincia</label>
        <input name="provincia" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Municipio</label>
        <input name="seccion_municipio" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Zona</label>
        <input name="zona_villa" type="text" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Dirección</label>
        <input name="avenida_calle" type="text" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">N° calle</label>
        <input name="nro_vivienda" type="text" class="form-control">
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
    <div class="col-md-9">
        <a href="/administrador/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
        <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
    </div>
    {{--  --}}

</form>
@stop
