<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradoProfesor;

use function PHPUnit\Framework\returnValue;

class GradoProfesorController extends Controller
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
        return view('gradoProfe.GradoProfesor',compact('grados'));
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
        $grados = new GradoProfesor($request->input());
        $grados->saveOrFail();
        return redirect('grados');
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
        $grado = GradoProfesor::find($id);
        return view('gradoProfe.editarGrado', compact('grado'));
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
        $grado = GradoProfesor::find($id);
        $grado->fill($request->input())->saveOrFail();
        return redirect('grados');
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
