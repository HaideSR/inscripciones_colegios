@extends('administrador.index')

@section('content')
<a href="/administrador/alumno/create" class="btn btn-primary">Nuevo alumno</a>
<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Codigo Rude</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Ci</th>
      <th scope="col">Sexo</th>
      <th scope="col">Tutor</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($alumnos as $alumno)
        <tr class='Secondary'>
          <td>{{$alumno->id}}</td>
          <td>
            <a href="/administrador/rude/{{$alumno->id}}">{{$alumno->rude}}</a>  
          </td>
          <td>{{$alumno->nombres}}</td>
          <td>{{$alumno->apellido_paterno}}</td>
          <td>{{$alumno->apellido_materno}}</td>
          <td>{{$alumno->ci}}</td>
          <td>{{$alumno->sexo}}</td>
          <td>
            <small>{{$alumno->tutorNombres}} {{$alumno->tutorPaterno}} {{$alumno->tutorMaterno}}            </small>
          </td>
          <td class="flex">
            <a href="/administrador/alumno/{{$alumno->id}}" class="btn btn-warning">Ver datos</a>
            {{-- <a href="/administrador/alumno/{{$alumno->id}}/edit" class="btn btn-info">Editar</a> --}}
            <form action="{{route('alumno.destroy', $alumno->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('estas seguro de eliminar?')"  class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>

@stop
