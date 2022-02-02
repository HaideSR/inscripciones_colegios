@extends('administrador.index')

@section('content')
<a href="/administrador/nivel/create" class="btn btn-primary">Nueva nivel</a>
<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($nivel as $nivel)
        <tr class="Secondary">
          <td>{{$nivel->id}}</td>
          <td>{{$nivel->nombre}}</td>
          <td class="flex">
            <a href="/administrador/nivel/{{$nivel->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('nivel.destroy', $nivel->id)}}" method="POST">
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
