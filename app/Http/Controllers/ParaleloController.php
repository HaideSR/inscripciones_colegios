<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paralelo = Paralelo::orderBy("id")->get();
        return view('administrador.paralelo.index')->with('paralelo', $paralelo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.paralelo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paralelo = new Paralelo();
        $paralelo->timestamps = false;
        $paralelo->nombre = $request->get('nombre');

        $paralelo->save();

        return redirect('/administrador/paralelo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paralelo = Paralelo::find($id);
        return view('administrador.paralelo.edit')->with('paralelo', $paralelo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paralelo = Paralelo::find($id);
        $paralelo->nombre = $request->get('nombre');
        $paralelo->save();

        return redirect('/administrador/paralelo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paralelo = Paralelo::find($id);
        $paralelo->delete();
        return redirect('/administrador/paralelo');
    }
}
