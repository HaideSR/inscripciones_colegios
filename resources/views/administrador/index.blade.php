<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de inscripciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if ( !Session()->get('usuarioSesion'))
        @php
            header("Location: ". URL::to('/login'));
            exit();
        @endphp
    @endif
    <div class="main">
       <div class="menu" id="sidebar" >
          <div class="junin">
              <p>
                  UNIDAD EDUCATIVA "JUNIN"
              </p>
          </div>
            <ul class="nav">
                <li><a href="/administrador/curso/"><i class="fas fa-boxes"></i>Curso</a></li>
                <li><a href="/administrador/nivel/"><i class="fas fa-chart-line"></i>Nivel</a></li>
                <li><a href="/administrador/turno/"><i class="fas fa-hourglass-start"></i>Turno</a></li>
                <li><a href="/administrador/paralelo/"><i class="fas fa-boxes"></i>Paralelo</a></li>
                <li><a href="/administrador/materia/"><i class="fas fa-book-reader"></i>Materias</a></li>
                <li><a href="/administrador/alumno/"><i class="fas fa-user-graduate"></i>Alumno</a></li>
                <li><a href="/administrador/profesor/"><i class="fas fa-chalkboard-teacher"></i>Profesor</a></li>
                <li><a href="/administrador/inscripcion/"><i class="fas fa-file-signature"></i>Inscripciones</a></li>
                {{-- <hr> --}}
                <li><a href="/administrador/usuarios/"><i class="fas fa-user"></i>Administradores</a></li>
            </ul>
           <div>

           </div>
       </div>
       <div class="content-app">
            <div class="menu-sup">
                <div>
                    <i class="fas fa-user"> </i>
                    <span>
                        <b>{{ Session()->get('usuarioSesion') }}</b>
                        <small>{{ Session()->get('rol') }}</small>
                    </span>
                    |
                    <a href="/logout">
                        <i class="fas fa-off"></i>
                        <small>Cerrar sesión</small>
                    </a>
                </div>
            </div>
            <div class="container">
                @yield('content')
            </div>
       </div>
    </div>
</body>

</html>
