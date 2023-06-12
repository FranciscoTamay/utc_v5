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
        $request ->validate(
            [
                'codigo'=>'required|unique:maestros|numeric',
                'sexo'=>'required | max:50',
                'apellido_paterno'=>'required | max:150',
                'apellido_materno'=>'required | max:150',
                'nombres'=>'required | max:150',
                'curp'=>'required| unique:maestros',
                'num_seguro'=>'required | unique:maestros',
                'rfc'=>'required | unique:maestros',
                'id_grado'=>'required | numeric ',
            ]
            );


            $maestro = new Maestros;
            $maestro->codigo = $request->codigo;
            $maestro->sexo = $request->sexo;
            $maestro->apellido_paterno = $request->apellido_paterno;
            $maestro->apellido_materno = $request->apellido_materno;
            $maestro->nombres = $request->nombres;
            $maestro->curp = $request->curp;
            $maestro->num_seguro = $request->num_seguro;
            $maestro->rfc = $request->rfc;
            $maestro->id_grado = $request->id_grado;
            
            $maestro->save();
            return back()->with('success','Maestro Validado con Exito');
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
