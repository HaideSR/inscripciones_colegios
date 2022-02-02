@extends('administrador.index')
@section('content')

<a href="/administrador/inscripcion/create" class="btn btn-primary mb">Nueva Inscripcion</a>
<div class="card p-2">
    <div class="grid g-auto">
        <div>
           <label>Gestion</label>
           <select id="gestion" class="form-select">
              <option value="">Todos</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
           </select>
        </div>
        {{-- <div>
           <label for="">Turno</label>
           <select id="turno" class="form-select">
              <option value="">Todos</option>
              @foreach ($turnos as $turno)
              <option value="{{$turno->id}}">{{$turno->nombre}}</option>
              @endforeach
           </select>
        </div>
        <div>
           <label for="">Nivel</label>
           <select id="nivel" class="form-select">
              <option value="">Todos</option>
              @foreach ($niveles as $nivel)
              <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
              @endforeach
           </select>
        </div>
        <div>
            <label for="">Paralelo</label>
            <select id="paralelo" class="form-select">
               <option value="">Todos</option>
               @foreach ($paralelos as $paralelo)
                 <option value="{{$paralelo->id}}">{{$paralelo->nombre}}</option>
               @endforeach
            </select>
         </div>--}}
        <div>
            <label for="">Curso</label>
            <select name="id_curso" id="curso" class="form-select">
                <option value="">Todos</option>
                @foreach ($cursos as $curso)
                  <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                @endforeach
            </select>
         </div>
     </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Alumno</th>
            <th>C.I</th>
            <th>Curso</th>
            <th>Paralelo</th>
            <th>Nivel</th>
            <th>Turno</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inscripciones as $inscripcion)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$inscripcion->apellido_paterno}} {{$inscripcion->apellido_materno}} {{$inscripcion->nombres}}</td>
                <td>{{$inscripcion->ci}}</td>
                <td>{{$inscripcion->curso}}</td>
                <td>{{$inscripcion->paralelo}}</td>
                <td>{{$inscripcion->nivel}}</td>
                <td>{{$inscripcion->turno}}</td>
                <td class="flex">
                    <!-- <a href="/administrador/inscripcion/{{$inscripcion->id}}/edit" class="btn btn-info">Editar</a> -->
                    <form action="{{route('inscripcion.destroy', $inscripcion->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('estas seguro de eliminar?')"  class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="../../js/filtroCurso.js"></script>
<script src="../../js/filtroCursoLista.js"></script>
@stop
