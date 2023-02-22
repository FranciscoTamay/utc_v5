<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignaturas;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignaturas = Asignaturas::all();
        return view('Asignaturas.asignaturas',compact('asignaturas'));

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
        $asignatura = new Asignaturas($request->input());
        $asignatura->saveOrFail();
        return redirect('asignaturas');
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
        $asignatura = Asignaturas::find($id);
        return view('Asignaturas.editarAsignaturas',compact('asignatura'));
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
        $asignatura = Asignaturas::find($id);
        $asignatura->fill($request->input())->saveOrFail();
        return redirect('asignaturas');
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
        $asignatura = Asignaturas::find($id);
        $asignatura -> delete();
        return redirect('asignaturas');
    }
}
