@extends('administrador.index')

@section('content')
<a href="/administrador/turno/create" class="btn btn-primary">Nuevo Turno</a>
<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($turno as $turno)
        <tr class="Secondary">
          <td>{{$turno->id}}</td>
          <td>{{$turno->nombre}}</td>
          <td class="flex">
            <a href="/administrador/turno/{{$turno->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('turno.destroy', $turno->id)}}" method="POST">
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
