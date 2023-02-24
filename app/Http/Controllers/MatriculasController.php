<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matriculas;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matriculas = Matriculas::all();
        return view('matriculas.matriculas',compact('matriculas'));
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
        $matricula = new Matriculas($request->input());
        $matricula->saveOrFail();
        return redirect('matriculas');
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
        $matricula = Matriculas::find($id);
        return view('matriculas.editarMatriculas',compact('matricula'));

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
        $matricula = Matriculas::find($id);
        $matricula->fill($request->input())->saveOrFail();
        return redirect('matriculas');

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
        $matricula = Matriculas::find($id);
        $matricula->delete();
        return redirect('matriculas');
    }
}
