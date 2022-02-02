@extends('administrador.index')

@section('content')
<a href="/administrador/paralelo/create" class="btn btn-primary">Nuevo Paralelo</a>
<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($paralelo as $paralelo)
        <tr class="Secondary">
          <td>{{$paralelo->id}}</td>
          <td>{{$paralelo->nombre}}</td>
          <td class="flex">
            <a href="/administrador/paralelo/{{$paralelo->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('paralelo.destroy', $paralelo->id)}}" method="POST">
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
