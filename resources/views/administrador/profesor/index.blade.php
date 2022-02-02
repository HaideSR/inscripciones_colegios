@extends('administrador.index')

@section('content')
<a href="/administrador/profesor/create" class="btn btn-primary">Nuevo profesor</a>
<table class="table  table-striped mt-4 fz-12">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Ci</th>
      <th scope="col">Nro Item</th>
      <th scope="col">Sexo</th>
      <th scope="col">Direccion</th>
      <th scope="col">Correo</th>
      <th scope="col">Celular</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($profesores as $profesor)
        <tr class="Secondary">
          <td>{{$profesor->id}}</td>
          <td>{{$profesor->nombres}}</td>
          <td>{{$profesor->apellido_paterno}}</td>
          <td>{{$profesor->apellido_materno}}</td>
          <td>{{$profesor->fecha_nacimiento}}</td>
          <td>{{$profesor->ci}}{{$profesor->complemento}}</td>
          <td>{{$profesor->nitem}}</td>
          <td>{{$profesor->sexo}}</td>
          <td>{{$profesor->avenida_calle}} N°{{$profesor->nro_vivienda}} </td>
          <td>{{$profesor->correo}}</td>
          <td>{{$profesor->celular}}</td>
          <td class="flex">
            <a href="/administrador/profesor/{{$profesor->id}}/edit" class="btn btn-info">Editar</a>
            <form action="{{route('profesor.destroy', $profesor->id)}}" method="POST">
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
