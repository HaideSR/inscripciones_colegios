<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
// use App\Http\Controllers\MateriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
///login
Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::post('login/init', [UsuarioController::class, 'ingresar'])->name('ingresar');

///materia
Route::resource('/administrador/materia', 'App\Http\Controllers\MateriaController');
///
Route::get('/administrador', function () {
    return view('administrador.index');
});
//usuarios
Route::resource('/administrador/usuarios', 'App\Http\Controllers\UsuarioController');
//nivel
Route::resource('/administrador/nivel', 'App\Http\Controllers\NivelController');
//turno
Route::resource('/administrador/turno', 'App\Http\Controllers\TurnoController');
//paralelo
Route::resource('/administrador/paralelo', 'App\Http\Controllers\ParaleloController');
//profesor
Route::resource('/administrador/profesor', 'App\Http\Controllers\ProfesorController');
//Alumno
Route::get('/administrador/alumno/buscar', 'App\Http\Controllers\AlumnoController@buscar');
Route::resource('/administrador/alumno', 'App\Http\Controllers\AlumnoController');
// Route::resource('/administrador/alumno/show', 'App\Http\Controllers\AlumnoController@showAlumno');
//curso
Route::get('/administrador/curso/filter', 'App\Http\Controllers\CursoController@filterCurso');
Route::resource('/administrador/curso', 'App\Http\Controllers\CursoController');
//inscripciones
Route::resource('/administrador/inscripcion', 'App\Http\Controllers\InscripcionController');
//buscador

//Rude
Route::resource('/administrador/rude', 'App\Http\Controllers\RudeController');