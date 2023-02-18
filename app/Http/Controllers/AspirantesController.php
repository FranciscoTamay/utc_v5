<?php

namespace App\Http\Controllers;

use App\Models\Aspirantes;
use App\Models\Carreras;
use App\Models\Procedencias;
use Illuminate\Http\Request;

class AspirantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carreras = Carreras::all();
        $procedencias = Procedencias::all();
        $aspirantes = Aspirantes::select('folio','nombres','apellido_p','apellido_m','curp','correo','telefono','localidad','genero','id_procedencia','id_carrera','nombre_carrera','nombre_esc',)
     ->join('carreras','carreras.id','=','aspirantes.id_carrera',)
     ->join('procedencia','procedencia.id','=','aspirantes.id_procedencia')->get();
        return view('aspirantes.aspirantes',compact('aspirantes','procedencias','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
