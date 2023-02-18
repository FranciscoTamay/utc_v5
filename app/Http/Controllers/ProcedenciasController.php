<?php

namespace App\Http\Controllers;

use App\Models\Procedencias;

use Illuminate\Http\Request;

class ProcedenciasController extends Controller
{
 
    public function index()
    {
        //
        $procedencias= Procedencias::all();
        return view('aspirantes.procedencia',compact('procedencias'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $procedencia = new Procedencias($request->input());
        $procedencia->saveOrFail();
        return redirect('procedencias');


    }

    public function show($id)
    {
        //
        $procedencia = Procedencias::find($id);
        return view('aspirantes.edtProc',compact('procedencia'));
    }


    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
        $procedencia = Procedencias::find($id);
        $procedencia-> fill($request->input())->saveOrFail();
        return redirect ('procedencias');
    }


    public function destroy($id)
    {
        //
        $procedencia = Procedencias::find($id);
        $procedencia->delete();
        return redirect('procedencias');
    }
}
