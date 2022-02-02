<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $curso =  Curso::select()
        // ->leftJoin('turno AS T', 'curso.id_turno' , '=', 'T.id')
        // ->leftJoin('nivel AS N', 'curso.id_nivel' , '=', 'N.id')
        // ->leftJoin('paralelo AS P', 'curso.id_paralelo' , '=', 'P.id')
        // ->where('activo', true)
        // ->select('curso.nombre','curso.id','T.nombre as nombreturno','N.nombre as nombrenivel','P.nombre as nombreparalelo')
        // ->orderBy('curso.id')
        // ->get();

        // return view('administrador.curso.index')->with('cursos', $curso);
        $materias = Materia::select()
        ->leftJoin('materia_curso_profesor AS MC', 'materia.id', '=',  'MC.id_materia')
        ->leftJoin('profesor AS PR', 'MC.id_profesor', '=','PR.id')
        ->leftJoin('persona AS P', 'PR.id_persona' , '=', 'P.id')
        ->select('materia.nombre', 'materia.sigla','materia.id','P.nombres as nombreprofesor',
                'P.apellido_paterno', 'P.apellido_materno')
        ->get();
        return view('administrador.materia.index')->with('materias', $materias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.materia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new Materia();
        $materia->timestamps = false;
        $materia->nombre = $request->get('nombre');
        $materia->sigla = $request->get('sigla');
        $materia->activo = true;

        $materia->save();

        return redirect('/administrador/materia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        return view('administrador.materia.edit')->with('materia', $materia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materia = Materia::find($id);

        $materia->nombre = $request->get('nombre');
        $materia->sigla = $request->get('sigla');
        $materia->activo = true;
        $materia->save();
        return redirect('/administrador/materia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->activo = false;
        $materia->save();
        return redirect('/administrador/materia');
    }
}
