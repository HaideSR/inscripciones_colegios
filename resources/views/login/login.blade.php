<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>Bienvenidos</h1>
            @if ( Session()->get('usuarioSesion'))
                @php
                    header("Location: ". URL::to('/administrador'));
                    exit();
                @endphp
            @endif

            <form action="{{ route('ingresar') }}" method="POST">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <input name="nombre_usuario" type="text" placeholder="Nombre de Usuario">
                <input name="password" type="password" placeholder="Contraseña">
                <button type="submit" id="login-button">Ingresar</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>
