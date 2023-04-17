<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificaciones;
use App\Models\Asignaturas;
use App\Models\Carreras;
use App\Models\Maestros;
use App\Models\Grupos;
use App\Models\Matriculas;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignaturas::all();
        $carreras = Carreras::all();
        $maestros = Maestros::all();
        $grupos = Grupos::all();
        return view('calificaciones.calificaciones',compact('asignaturas','maestros','grupos','carreras'));
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

    public function obtenerAlumnosPorGrupo(Request $request)
{
    // Obtener el id del grupo seleccionado
    $grupoId = $request->input('id');

    // Obtener los alumnos del grupo
    $alumnos = Matriculas::where('id_grupo', $grupoId)->get();

    // Devolver los alumnos en formato JSON
    return response()->json($alumnos);
}
}
