@extends('administrador.index')

@section('content')
<a href="/administrador/curso/create" class="btn btn-primary">Nuevo Curso</a>
<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Paralelo</th>
      <th scope="col">Nivel</th>
      <th scope="col">Turno</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cursos as $curso)
        <tr class='Secondary'>
          <td>{{$curso->id}}</td>
          <td>{{$curso->nombre}}</td>
          <td>{{$curso->nombreparalelo}}</td>
          <td>{{$curso->nombrenivel}}</td>
          <td>{{$curso->nombreturno}}</td>
          <td class="flex">
            <a href="/administrador/curso/{{$curso->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('curso.destroy', $curso->id)}}" method="POST">
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
