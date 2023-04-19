<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\Matriculas;
use App\Models\Asignaturas;
use App\Models\Carreras;
use App\Models\Maestros;

class GruposController extends Controller
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
        $grupos = Grupos::select('grupos.id','id_carrera','nombre_carrera')
        ->join('carreras','carreras.id','=','grupos.id_carrera')->get();
         // aqui vemos que pasa algo diferentes usamos la variable grupo junto con su modelo
            // pero vemos que no tiene un all para que use todos si no que tiene un select
            // es que en este caso el decimos que tome ciertos campos de la base de datos
            // pero esto se hace con el fin de que se pueda hacer lo join porque no solo le vamos a 
            // presentar al usuario un id para la carrera
            // de alli usamos el join que es igual a un INNER JOIN en SQL pero sin necesidad de poner
            // como en SQL laravel nos facilita que podemos hacer lo mismo que en sql pero de una 
            // forma mas sencilla ya que primero le decimos en que tabla esta y tomamdo el id de la tabla 
            // 'tabla','tabla.llave primaria','=' igual logico para decirle que este sera igual
            // 'tabla con la que va relacionada.llave foranea', de esta forma le decimos que cuando 
            // el id de la primera tabla sea igual al de la llave foranea con el get() me los traiga 
            // y de esta forma podemos usar los demas campos de las demas tablas
        $carreras = Carreras::all();
        // Aqui por medio de la variable alumnos lo que hacemos es que haga uso del modelo carreras
        // para que de esta forma en la vista lo podamos usar.
        return view('grupos.grupos',compact('grupos','carreras'));
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
        //Esta funcion es la que usaremos para que podemos mandar los datos 
        // que el usuario a ingresado en los campos de la vista, ya que esta 
        // tiene como parametro el request que es el que se encargara de poder tomar
        // todos los datos que el usuario ingreso o selecciono.
        $grupo = new Grupos($request->input());
        // en este parte le decimos que cree un nuevo registro primero haciendo
        // referencia al modelo le decimos que por medio
        // del request tome lo que haya en los input o select que tambien puede ser tomado de select
        $grupo->saveOrFail();
        // usamos el metodo saveOrFail para que una vez recibido todos los datos
        // lo mande a la base de datos para ser guardados
        return redirect('grupos');
        // por ultimo solo nos redireccionara a la vista antes declarada en el index 
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
        $grupo = Grupos::find($id);
        // en esta parte es donde el controlador va a buscar cual es el registro que va 
        // a tomar, esto lo hace con la metodo find y como parametro el id del registro
        $carreras = Carreras::all();
        // traemos todas las carreras almacenadas en la variable para poder usarla en la vista 
        return view('grupos.editarGrupos',compact('grupo','carreras'));
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
        $grupo = Grupos::find($id);
        // primero busca en el modelo basandose del id
        $grupo->fill($request->input())->saveOrFail();
        // aqui una vez que el usuario capture sus datos en los input o select,
        // por el metodo fill, este es para que no se genere un registro nuevo si no que se 
        // conserve el mismo pero con los cambios y los cambios son efectuados por el metodo
        // saveOrFile
        return redirect('grupos');
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
        ////la funcion destoy es para eliminar un registro antes creado este al igual 
        // que show y update tiene un parametro id que es para borrar uno es especifico 
        $grupo = Grupos::find($id);
        // primero buscamos al alumno por el id
        $grupo -> delete();
        // una ves que se encuentre lo que pasa es que ese alumno solo se eliminara 
        // con el metodo delete y de esta forma todos sus registros ya no estara en la base de datos
        return redirect('grupos');
        // al firnal solo redireccionamos a la vista del index
    }
}
