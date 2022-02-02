@extends('administrador.index')

@section('content')
<a href="/administrador/alumno/" class="">Alumnos</a>
<div class="p">
    <fieldset class="scheduler-border p">
        <legend class="scheduler-border">Alumno</legend>
        <div class="p-4">
            <div>
                <small>Nombres y apellidos: </small>
                <b>{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</b>
            </div>
            <div>
                <small>C.I: </small>
                <b>{{$ci->ci}}</b>
            </div>
            <div>
                <small>Genero: </small>
                <b>{{$persona->sexo =='F' ? 'Femenino': 'Masculino'}}</b>
            </div>
            <div>
                <small>Fecha de Nacimiento: </small>
                <b>{{$persona->fecha_nacimiento}}</b>
            </div>
            <div>
                <small>Departamento: </small>
                <b>{{$persona->departamento}}</b>
            </div>
            <div>
                <small>Provincia: </small>
                <b>{{$persona->provincia}}</b>
            </div>
            <div>
                <small>Seccion/Municipio: </small>
                <b>{{$persona->seccion_municipio}}</b>
            </div>
            <div>
                <small>Localidad/Comunidad: </small>
                <b>{{$persona->localidad_comunidad}}</b>
            </div>
            <div>
                <small>Zona: </small>
                <b>{{$persona->zona_villa}}</b>
            </div>
            <div>
                <small>Avenida/Calle: </small>
                <b>{{$persona->avenida_calle}}</b>
            </div>
            <div>
                <small>Nro de Vivienda: </small>
                <b>{{$persona->nro_vivienda}}</b>
            </div>
            <div>
                <small>Telefono Fijo: </small>
                <b>{{$persona->telefono_fijo}}</b>
            </div>
        </div>
    </fieldset>
    <fieldset class="scheduler-border p">
        <legend class="scheduler-border">Tutor</legend>
        <div class="p-4">
            <div>
                <small>Nombre y apellidos:</small>
                <b>{{$tutor->nombres}} {{$tutor->apellido_paterno}} {{$tutor->apellido_materno}}</b>
            </div>
            <div>
                <small>Celular:</small>
                <b>{{$tutor->celular}} </b>
            </div>

        </div>
    </fieldset>
</div>
@stop
