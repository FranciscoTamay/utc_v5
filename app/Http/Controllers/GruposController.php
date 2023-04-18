<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\Matriculas;
use App\Models\Asignaturas;
use App\Models\Carreras;
use App\Models\Maestros;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grupos = Grupos::select('grupos.id','id_carrera','nombre_carrera')
        ->join('carreras','carreras.id','=','grupos.id_carrera')->get();
        $carreras = Carreras::all();
        return view('grupos.grupos',compact('grupos','carreras'));

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
        $grupo = new Grupos($request->input());
        $grupo->saveOrFail();
        return redirect('grupos');
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
        $grupo = Grupos::find($id);
        $asignaturas = Asignaturas::all();
        $matriculas = Matriculas::all();
        $carreras = Carreras::all();
        $maestros = Maestros::all();
        return view('grupos.editarGrupos',compact('grupo','asignaturas','matriculas','carreras','maestros'));
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
        $grupo = Grupos::find($id);
        $grupo->fill($request->input())->saveOrFail();
        return redirect('grupos');
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
        $grupo = Grupos::find($id);
        $grupo -> delete();
        return redirect('grupos');
    }
}
