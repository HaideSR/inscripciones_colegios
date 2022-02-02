<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Turno;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $inscripciones = Inscripcion::select('inscripcion.id', 'CI.ci', 'P.nombres', 'P.apellido_paterno', 'P.apellido_materno', 'C.nombre as curso', 'N.nombre as nivel', 'T.nombre as turno', 'PL.nombre as paralelo')
            ->join('alumno as A','inscripcion.id_alumno','=','A.id')
            ->join('persona as P','A.id_perona','=','P.id')
            ->join('carnet_identidad as CI','P.id_ci','=','CI.id')
            ->join('curso as C','inscripcion.id_curso','=','C.id')
            ->join('nivel as N','C.id_nivel','=','N.id')
            ->join('turno as T','C.id_turno','=','T.id')
            ->join('paralelo as PL','C.id_paralelo','=','PL.id');

        // echo $inscripciones;
        $gestion = $request->gestion;
        $idCurso = $request->id_curso;
        if($gestion){
            $inscripciones->where('inscripcion.gestion', $request->gestion );
        }
        if($idCurso){
            $inscripciones->where('inscripcion.id_curso',  $request->id_curso );
        }
        //
        $niveles = Nivel::all();
        $turnos = Turno::all();
        $paralelos = Paralelo::all();
        $cursos = Curso::all();

        $dataInscripciones = $inscripciones->get();
        return view('administrador.inscripcion.index')
            ->with('paralelos', $paralelos)
            ->with('turnos', $turnos)
            ->with('niveles', $niveles)
            ->with('cursos', $cursos)
            ->with('inscripciones', $dataInscripciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Nivel::all();
        $turnos = Turno::all();
        $paralelos = Paralelo::all();
        return view('administrador.inscripcion.create')
            ->with('paralelos', $paralelos)
            ->with('turnos', $turnos)
            ->with('niveles', $niveles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new \DateTime();
        $ultimoInscri = Inscripcion::orderBy('id', 'desc')->first();
        $inscripcion =  new Inscripcion();
        $inscripcion->timestamps = false;
        $inscripcion->id = $ultimoInscri->id+1;
        $inscripcion->gestion = $request->get('gestion');
        $inscripcion->fecha =  $now->format('Y-m-d');
        $inscripcion->id_alumno = $request->get('id_alumno');
        $inscripcion->id_secretario = $request->get('id_secretario');
        $inscripcion->id_curso = $request->get('id_curso');
        $inscripcion->save();
        // inscripcion?id_curso=1&gestion=2023
        return redirect('/administrador/inscripcion?id_curso='.$inscripcion->id_curso.'&gestion='.$inscripcion->gestion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $inscripcion = Inscripcion::find($id);
        $inscripcion->delete();
        return back();
    }
}
