<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Turno;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $curso =  Curso::select()
        ->leftJoin('turno AS T', 'curso.id_turno' , '=', 'T.id')
        ->leftJoin('nivel AS N', 'curso.id_nivel' , '=', 'N.id')
        ->leftJoin('paralelo AS P', 'curso.id_paralelo' , '=', 'P.id')
        ->where('activo', true)
        ->select('curso.nombre','curso.id','T.nombre as nombreturno','N.nombre as nombrenivel','P.nombre as nombreparalelo')
        ->orderBy('curso.id')
        ->get();

        return view('administrador.curso.index')->with('cursos', $curso);
    }
    public function filterCurso(Request $request){
        $idNivel = $request->id_nivel;
        $idTurno = $request->id_turno;
        $idParalelo = $request->id_paralelo;
        $cursos = Curso::select();
        if($idNivel){
            $cursos->where('id_nivel', '=', $idNivel);
        }
        if($idTurno){
            $cursos->where('id_turno', '=', $idTurno);
        }
        if($idParalelo){
            $cursos->where('id_paralelo', '=', $idParalelo);
        }
        $data = $cursos->get();
        return $data->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $turnos = Turno::orderBy("id")->get();
        $niveles = Nivel::orderBy("id")->get();
        $paralelos = Paralelo::orderBy("id")->get();
        return view('administrador.curso.create')
        ->with('turnos', $turnos)
        ->with('niveles', $niveles)
        ->with('paralelos', $paralelos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso =  new Curso(); //cambiar por psesona
        $curso->timestamps = false;
        $curso->nombre = $request->get('nombre');
        $curso->activo = true;
        $curso->id_nivel = $request->get('id_nivel');
        $curso->id_paralelo = $request->get('id_paralelo');
        $curso->id_turno = $request->get('id_turno');
        $curso->save();

        return redirect('/administrador/curso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        $turno = Turno::orderBy("id")->get();
        $nivel = Nivel::orderBy("id")->get();
        $paralelo = Paralelo::orderBy("id")->get();
        return view('administrador.curso.edit')
        ->with('curso', $curso)
        ->with('turnos', $turno)
        ->with('niveles', $nivel)
        ->with('paralelos', $paralelo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->nombre = $request->get('nombre');
        $curso->activo = true;
        $curso->id_nivel = $request->get('id_nivel');
        $curso->id_paralelo = $request->get('id_paralelo');
        $curso->id_turno = $request->get('id_turno');
        $curso->save();

        return redirect('/administrador/curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->activo = false;
        $curso->save();
        return redirect('/administrador/curso');
    }
}
