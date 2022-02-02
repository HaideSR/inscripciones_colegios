@extends('administrador.index')

@section('content')
<h2>NUEVA INSCRIPCION</h2>
<form action="/administrador/inscripcion/" method="POST" class="row g-3">
    @method('post')
    @csrf
    <div class="grid g-auto">
        <div>
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
        </div>
        <div>
           <label for="">Curso</label>
           <select name="id_curso" id="curso" class="form-select" disabled required>
              <option value="">Cargando...</option>
           </select>
        </div>
     </div>
     <input type="hidden" name="id_alumno" id="id_alumno" required>
     <input type="hidden" name="id_secretario" value="{{ Session()->get('idUser') }}" required>
     <div class="mb-3">
        <label class="form-label">Ingresa C.I alumno</label>
        <input id="alumno" list="listalumno" type="search" placeholder="Buscar ci..." class="form-control">
        <datalist id="listalumno"></datalist>
     </div>
     <div>
        <label for="">Gestion</label>
        <select name="gestion" id="" class="form-select">
           <option value="2022">2022</option>
           <option value="2023">2023</option>
           <option value="2024">2024</option>
        </select>
     </div>

  <div>
    <a href="/administrador/inscripcion" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
  </div>
</form>
<script src="../../js/filtroCurso.js"></script>
<script src="../../js/inscripciones.js"></script>
@stop
