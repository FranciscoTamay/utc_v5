<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanEstudio;

class PlanEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planEstudios = PlanEstudio::all();
        return view('planEstudio.planEstudio',compact('planEstudios'));
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
        $planEstudio = new PlanEstudio($request->input());
        $planEstudio->saveOrFail();
        return redirect('planEstudio');

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
        $planEstudio = PlanEstudio::find($id);
        return view('planEstudio.editarPlanEstudio',compact('planEstudio'));
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
        $planEstudio = PlanEstudio::find($id);
        $planEstudio->fill($request->input())->saveOrFail();
        return redirect('planEstudio');
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
        $planEstudio = PlanEstudio::find($id);
        $planEstudio -> delete();
        return redirect('planEstudio');
    }
}
