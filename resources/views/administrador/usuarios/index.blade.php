@extends('administrador.index')

@section('content')
<a href="/administrador/usuarios/create" class="btn btn-primary">Nuevo Administrador</a>
<table class="table  table-striped mt-4 fz-12">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">Rol</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Item</th>
      <th scope="col">Correo</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $usuario)
        <tr class="Secondary">
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->nombre_usuario}}</td>
          <td>{{$usuario->rol}}</td>
          <td>{{$usuario->nombres}}</td>
          <td>{{$usuario->apellido_paterno}}</td>
          <td>{{$usuario->apellido_materno}}</td>
          <td>{{$usuario->nitem}}</td>
          <td>{{$usuario->correo}}</td>
          <td class="flex">
            <a href="/administrador/usuarios/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
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
