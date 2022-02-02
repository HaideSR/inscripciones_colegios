<?php

namespace App\Http\Controllers;

use App\Models\CarnetIdentidad;
use App\Models\DireccionActual;
use App\Models\Persona;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores =  Profesor::select()
                        ->leftJoin('persona AS P', 'profesor.id_persona' , '=', 'P.id')
                        ->leftJoin('carnet_identidad AS C', 'P.id_ci' , '=', 'C.id')
                        ->leftJoin('direccion_actual AS D', 'P.id_direccion' , '=', 'D.id')
                        ->where('activo', true)
                        ->select('profesor.correo', 'profesor.id', 'profesor.nitem',
                            'C.ci', 'C.complemento',
                            'D.nro_vivienda','D.avenida_calle',
                            'P.nombres', 'P.apellido_paterno', 'P.apellido_materno', 'P.celular', 'P.sexo', 'P.fecha_nacimiento')
                        ->orderBy('profesor.id')
                        ->get();

        return view('administrador.profesor.index')->with('profesores', $profesores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CI
        $ci = new CarnetIdentidad();
        $ci->timestamps = false;
        $ci->ci = $request->get('ci');
        $ci->complemento = $request->get('complemento');
        $ci->save();
        $idCarnet = $ci->id;

        //
        $direccion = new DireccionActual();
        $direccion->timestamps = false;
        $direccion->departamento = $request->get('departamento');
        $direccion->provincia = $request->get('provincia');
        $direccion->seccion_municipio = $request->get('seccion_municipio');
        $direccion->zona_villa = $request->get('zona_villa');
        $direccion->localidad_comunidad = $request->get('zona_villa');
        $direccion->avenida_calle = $request->get('avenida_calle');
        $direccion->nro_vivienda = $request->get('nro_vivienda');
        $direccion->celular_contacto = $request->get('celular');
        $direccion->save();
        $idDireccion = $direccion->id;

        $persona = new Persona();
        $persona->timestamps = false;
        $persona->nombres = $request->get('nombres');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->sexo = $request->get('sexo');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = $request->get('celular');
        $persona->id_ci = $idCarnet;
        $persona->id_direccion = $idDireccion;
        $persona->save();
        $idPersona = $persona->id;

        $profesor =  new Profesor(); //cambiar por psesona
        $profesor->timestamps = false;
        $profesor->correo = $request->get('correo');
        $profesor->nitem = $request->get('nitem');
        $profesor->activo = true;
        $profesor->id_persona = $idPersona;
        $profesor->save();

        return redirect('/administrador/profesor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor =  Profesor::select()
                        ->leftJoin('persona AS P', 'profesor.id_persona' , '=', 'P.id')
                        ->leftJoin('carnet_identidad AS C', 'P.id_ci' , '=', 'C.id')
                        ->leftJoin('direccion_actual AS D', 'P.id_direccion' , '=', 'D.id')
                         ->where('profesor.id', $id)
                        ->select('profesor.correo', 'profesor.id', 'profesor.nitem',
                            'C.ci','C.complemento',
                            'D.departamento','D.nro_vivienda','D.avenida_calle','D.provincia','D.seccion_municipio','D.zona_villa',
                            'P.nombres', 'P.apellido_paterno', 'P.apellido_materno', 'P.celular', 'P.sexo', 'P.fecha_nacimiento')
                        ->get();


        return view('administrador.profesor.edit')->with('profesor', $profesor[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profesor = Profesor::find($id);

        $profesor->correo = $request->get('correo');
        $profesor->nitem = $request->get('nitem');
        $profesor->activo = true;
        $idPersona=$profesor->id_persona;
        $profesor->update();

        $persona =Persona::find($idPersona);

        $persona->nombres = $request->get('nombres');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->sexo = $request->get('sexo');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = $request->get('celular');
        $idCarnet=$persona->id_ci;
        $idDireccion=$persona->id_direccion;
        $persona->update();
         //CI
        $ci = CarnetIdentidad::find($idCarnet);

        $ci->ci = $request->get('ci');
        $ci->complemento = $request->get('complemento');
        $ci->update();


        //
        $direccion =DireccionActual::find($idDireccion);

        $direccion->departamento = $request->get('departamento');
        $direccion->provincia = $request->get('provincia');
        $direccion->seccion_municipio = $request->get('seccion_municipio');
        $direccion->zona_villa = $request->get('zona_villa');
        $direccion->localidad_comunidad = $request->get('zona_villa');
        $direccion->avenida_calle = $request->get('avenida_calle');
        $direccion->nro_vivienda = $request->get('nro_vivienda');
        $direccion->celular_contacto = $request->get('celular');
        $direccion->update();



        return redirect('/administrador/profesor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $profesor = Profesor::find($id);
        $profesor->activo = false;
        $profesor->save();
        return redirect('/administrador/profesor');
    }
}
