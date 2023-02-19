<?php

namespace App\Http\Controllers;

use App\Models\Aspirantes;
use App\Models\Carreras;
use App\Models\Procedencias;
use Illuminate\Http\Request;

class AspirantesController extends Controller
{

    public function index()
    {
        //
       $carreras = Carreras::all();
      $procedencias = Procedencias::all();
     $aspirantes = Aspirantes::select('aspirantes.id','folio','nombres','apellido_p','apellido_m','curp','correo','telefono','localidad','genero','id_procedencia','id_carrera','nombre_carrera','nombre_esc')
      ->join('carreras','carreras.id','=','aspirantes.id_carrera',)
     ->join('procedencia','procedencia.id','=','aspirantes.id_procedencia')->get();
    return view('aspirantes.aspirantesV',compact('aspirantes','procedencias','carreras'));
    }
   

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $aspirante = new Aspirantes($request->input());
        $aspirante->saveOrFail();
        return redirect('asp');
    }

    
    public function show($id)
    {
        //
    
        $aspirante = Aspirantes::find($id);
        $procedencias = Procedencias::all();
        $carreras = Carreras::all();
        return view('aspirantes.edtAspi',compact('aspirante', 'procedencias','carreras'));

    }

  
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
        $aspirante = Aspirantes::find($id);
        $aspirante->fill($request->input())->saveOrFail();
        return redirect('asp');

    }


    public function destroy($id)
    {
        //
        $aspirante = Aspirantes::find($id);
        $aspirante->delete();
        return redirect('asp');
    }
}
