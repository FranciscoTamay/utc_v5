<?php

namespace App\Http\Controllers;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    public function index()
    {
        //
        $servicios = Servicios::all();
        return view('servicios.servicios',compact('servicios'));

    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([

            'codigo_serv' => 'required| unique:servicios',
            'nombre_serv' => 'required| unique:servicios',
            'precio_serv' => 'required',

        ]);
        $autor = new Servicios();
        $autor-> codigo_serv= $request->get('codigo_serv');
        $autor-> nombre_serv= $request->get('nombre_serv');
        $autor-> precio_serv= $request->get('precio_serv');
        $autor->save();
        return redirect('servicios')->with('success', '¡SERVICIO GUARDADO DE MANERA EXITOSA!');
    }

    public function show($id)
    {
        //
        $servicio = Servicios::find($id);
        return view('servicios.edtServ',compact('servicio'));
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $servicio = Servicios::find($id);
        $servicio->fill($request->input())->saveOrFail();
        return redirect('servicios')->with('warning', '¡SERVICIO EDITADO DE MANERA EXITOSA!');
    }


    public function destroy($id)
    {
        //
        $servicio = Servicios::find($id);
        $servicio->delete();
        return redirect('servicios')->with('danger', '¡SERVICIO ELIMINADO CON EXITO!');
    }
}