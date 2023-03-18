<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestros;
use App\Models\GradoProfesor;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grados = GradoProfesor::all();
        $maestros = Maestros::select('maestros.id','codigo','sexo','apellido_paterno','apellido_materno','nombres','curp','num_seguro','rfc','id_grado','grado_nombre')
        ->join('grado_prof','grado_prof.id','=','maestros.id_grado')->get();
        return view('maestros.maestros',compact('maestros','grados'));

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
        $maestro = new Maestros($request->input());
        $maestro->saveOrFail();
        return redirect('maestros');
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
        $maestro = Maestros::find($id);
        $grados = GradoProfesor::all();
        return view('maestros.editarMaestro',compact('maestro','grados'));
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
        $maestro = Maestros::find($id);
        $maestro->fill($request->input())->saveOrFail();
        return redirect('maestros');
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
        $maestro = Maestros::find($id);
        $maestro->delete();
        return redirect('maestros');
    }
}
