<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;
use App\Models\PlanEstudio;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carreras = Carreras::select('carreras.id','codigo_carrera','nombre_carrera','id_plan','nombre_plan')
        ->join('plan_estudio','plan_estudio.id','=','carreras.id_plan')->get();
        $planEstudios = PlanEstudio::all();
        return view('carreras.carreras',compact('carreras','planEstudios'));
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
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
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
        $carrera = Carreras::find($id);
        $planEstudios = PlanEstudio::all();
        return view('carreras.editarCarrera',compact('carrera','planEstudios'));
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
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
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
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
