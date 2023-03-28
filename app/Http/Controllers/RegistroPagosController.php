<?php

namespace App\Http\Controllers;

use App\Models\Registro_pagos;
use App\Models\Servicios;
use Illuminate\Http\Request;

class RegistroPagosController extends Controller
{
  
    public function index()
    {
        //
        $servicios = Servicios::all();
        $registro_pagos = Registro_pagos::select('registro_pagos.id','id_servicio','id_matricula','estado','nombre_serv')
        ->join('servicios','servicios.id','=','registro_pagos.id_servicio')->get();
        return view('servicios.pagoserv',compact('registro_pagos','servicios'));
        
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
        $request->validate([

            'id_servicio'  => 'required',
            'id_matricula'  => 'required',
            'estado'  => 'required',
        ]);

        $registro_pago = new Registro_pagos();
        $registro_pago->id_servicio = $request->get('id_servicio');
        $registro_pago->id_matricula = $request->get('id_matricula');
        $registro_pago->estado = $request->get('estado');
        $registro_pago->save();
        return redirect('registrop')->with('success', '¡SERVICIO GUARDADO DE MANERA EXITOSA!');

    }

  
    public function show($id)
    {
        //
       $registro_pago = Registro_pagos::find($id);
       $servicios = Servicios::all();
        return view('servicios.edtPago',compact('registro_pago','servicios'));
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // 
        $registro_pago = Registro_pagos::find($id);
        $registro_pago->fill($request->input())->saveOrFail();
        return redirect('registrop')->with('warning', '¡SERVICIO EDITADO DE MANERA EXITOSA!');;
    }

 
    public function destroy($id)
    {
        //
        $registro_pago = Registro_pagos::find($id);
        $registro_pago->delete();
        return redirect('registrop');
    }
}
