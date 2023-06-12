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
         ////La funcion index es la que nos sirve para poder mostrar la vista en donde el controlador 
        // podra mostrar los datos de una tabla de la base de datos, pero tambien podemos agregar 
        // dentro de esta otras funciones o variables especificas como a continuacion:
        $asignaturas = Asignaturas::all();
        // usamos la variable para hacer uso del modelo y poder usarla en la vista
        return view('Asignaturas.asignaturas',compact('asignaturas'));
        // aqui solo retornamos la vista seleccionando la vista primero en caso de que este en un carpeta
        // se puede hacer de esta manera ('nombre de la carpeta.nombre de la vista') y si solo e solo es
        // una vista solo debemos de poner su nombre de la vista asegurandonos que este en la carpeta views de laravel
        // al igual de la carpeta en caso de que este en la carpeta y con el compact pasamos la variable que creamos.

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'codigo_asignatura'=>'required|unique:asignaturas|numeric',
                'nombre_asignatura'=>'required|max:50',
                'num_unidades'=>'required|numeric|max:10',
                'horas'=>'required||numeric',
            ]
            );

            $asignatura= new Asignaturas;
            $asignatura->codigo_asignatura = $request->codigo_asignatura;
            $asignatura->nombre_asignatura = $request->nombre_asignatura;
            $asignatura->num_unidades = $request->num_unidades;
            $asignatura->horas = $request->horas;

            $asignatura->save();
            return back()->with("success","Asignatura Validad con Exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //la funcion show nos sirve para que podamos ver un registro en especifico
        // caba recalcar que este registro ya debe de estar creado anteriormente 
        // por eso es que tiene el parametro para que sepa que por medio del id se va a guiar
        $asignatura = Asignaturas::find($id);
        // en esta parte es donde el controlador va a buscar cual es el registro que va 
        // a tomar, esto lo hace con la metodo find y como parametro el id del registro
        return view('Asignaturas.editarAsignaturas',compact('asignatura'));
        // ya en este parte lo que hace es que nos retornara una vista una vez de que el
        // registro sea encontrado y con el compact usamos las variables antes declaradas
        // para poder usarlas en la vista y presentar los datos.
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
        //la funcion update es la que nos servira para que podamos hacer actualizaciones 
        // de los registros en la base de datos vemos que usa 2 parametros el request y el id
        // el id es para saber que es uno en especifico y no todos y por parte de request
        // es para que tome los datos que el usuario cambio.
        $asignatura = Asignaturas::find($id);
        // primero busca en el modelo basandose del id
        $asignatura->fill($request->input())->saveOrFail();
        // aqui una vez que el usuario capture sus datos en los input o select,
        // por el metodo fill, este es para que no se genere un registro nuevo si no que se 
        // conserve el mismo pero con los cambios y los cambios son efectuados por el metodo
        // saveOrFile
        return redirect('asignaturas');
         // y por ultimo solo redireccionamos a la vista del alumno del index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //la funcion destoy es para eliminar un registro antes creado este al igual 
        // que show y update tiene un parametro id que es para borrar uno es especifico 
        $asignatura = Asignaturas::find($id);
        // primero buscamos al alumno por el id
        $asignatura -> delete();
         // una ves que se encuentre lo que pasa es que ese alumno solo se eliminara 
        // con el metodo delete y de esta forma todos sus registros ya no estara en la base de datos
        return redirect('asignaturas');
         // al firnal solo redireccionamos a la vista del index
    }
}
