@extends('administrador.index')

@section('content')
<a href="/administrador/materia/create" class="btn btn-primary">Nueva Materia</a>
<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Sigla</th>
      <th scope="col">Profesor</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($materias as $materia)
        <tr class="Secondary">
          <td>{{$materia->id}}</td>
          <td>{{$materia->nombre}}</td>
          <td>{{$materia->sigla}}</td>
          <td>{{$materia->nombreprofesor}} {{$materia->apellido_paterno}} {{$materia->apellido_materno}}</td>
          <td class="flex">
            <a href="/administrador/materia/{{$materia->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('materia.destroy', $materia->id)}}" method="POST">
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
