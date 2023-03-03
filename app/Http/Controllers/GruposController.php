<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\Matriculas;
use App\Models\Asignaturas;
use App\Models\Carreras;

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
        $grupos = Grupos::select('grupos.id','id_matricula','id_asignatura','id_profesor','id_carrera','nombre_asignatura','nombre_carrera','matricula','apellido_paterno','apellido_materno','nombres')
        ->join('asignaturas','asignaturas.id','=','grupos.id_asignatura')
        ->join('carreras','carreras.id','=','grupos.id_carrera')
        ->join('matriculas','matriculas.id','=','grupos.id_matricula')
        ->join('maestros','maestros.id','=','grupos.id_profesor')->get();
        $carreras = Carreras::all();
        $asignaturas = Asignaturas::all();
        $matriculas = Matriculas::all();
        return view('grupos.grupos',compact('grupos','carreras','asignaturas'));

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
        return view('grupos.editarGrupos',compact('grupo'));
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
