<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;
use App\Models\Carreras;
use App\Models\Procedencias;
use Codedge\Fpdf\Fpdf\Fpdf;

// Aqui podemos observar que los use es para hacer uso de modelos o pluguins externos al controlador
// aqui lo que hacemos el generar instancia para hacer uso de esto mas tarde ene el controlador,
// por ejemplo aspirantes, carreras y precedencias son modelos que vamos dentro del controlador
// en cambio Fpdf es un libreria de php que nos permite generar pdf a base de codigo en el que podemos
// hacer nuestro propios formatos 

class Aspirantes2Controller extends Controller
{

    public function index()
    {
        //La funcion index es la que nos sirve para poder mostrar la vista en donde el controlador 
        // podra mostrar los datos de una tabla de la base de datos, pero tambien podemos agregar 
        // dentro de esta otras funciones o variables especificas como a continuacion:
        $nuevoFolio = 'UTC' . now()->format('m') . uniqid();
        // con la variable $nuevoFolio lo que hacemos es que concatene UTC junto con la fecha actual
        // este para generar un folio.
        $carreras = Carreras::all();
        // usamos la variable $carreras para hacer referencia al modelos y por medio de esta variable
        // es que podemos usar los datos que estan en la base de datos.
        $procedencias = Procedencias::all();
        // aqui pasa lo mismo usamos la  variable procedencias para hacer uso de la tabla escuela
        // de procedencia para poder usarla en la vista 
        $aspirantes = Aspirantes::select('aspirantes.id', 'folio', 'nombres', 'apellido_p', 'apellido_m', 'curp', 'correo', 'telefono', 'localidad', 'genero', 'id_procedencia', 'id_carrera', 'nombre_carrera', 'nombre_esc')
            ->join('carreras', 'carreras.id', '=', 'aspirantes.id_carrera',)
            ->join('procedencia', 'procedencia.id', '=', 'aspirantes.id_procedencia')->get();
            // aqui vemos que pasa algo diferentes usamos la variable aspirantes junto con su modelo
            // pero vemos que no tiene un all para que use todos si no que tiene un select
            // es que en este caso el decimos que tome ciertos campos de la base de datos
            // pero esto se hace con el fin de que se pueda hacer lo join porque no solo le vamos a 
            // presentar al usuario un id para la carrera o la precedencia 
            // de alli usamos el join que es igual a un INNER JOIN en SQL pero sin necesidad de poner
            // como en SQL laravel nos facilita que podemos hacer lo mismo que en sql pero de una 
            // forma mas sencilla ya que primero le decimos en que tabla esta y tomamdo el id de la tabla 
            // 'tabla','tabla.llave primaria','=' igual logico para decirle que este sera igual
            // 'tabla con la que va relacionada.llave foranea', de esta forma le decimos que cuando 
            // el id de la primera tabla sea igual al de la llave foranea con el get() me los traiga 
            // y de esta forma podemos usar los demas campos de las demas tablas
        return view('aspirantes.aspiranteAm', compact('aspirantes', 'procedencias', 'carreras'))->with('nuevoFolio', $nuevoFolio);
        // lo que hacemos aqui solo es decirle que retornemos una vista en el return view
        // ponemos 'nombre de la vista' o en caso de estar alojada en una capeta aparte 
        // va de la siguiente manera 'carpeta.vista' cabe recalcar que esta debe de estar 
        // alojada en la carpeta views de laravel, y el compact lo usamos para pasar las variables
        // que declaramos en la parte de arriba todas y cada una de ellas debe de estar de la misma 
        // forma que en en las de arriba si no al querer usarlas en la vista no funcionara,
        // por ultimo tenemos un with este es para decurle que tambien pasaremos el folio como
        // este le decimos que se genere de una form diferente pues lo tenemos que pasar de esta forma
        // porque no es un dato que tramos de la base de datos si no que es generado automaticamente.
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // Validacion del formulario
        $request->validate([
            'folio'=>'required|unique:aspirantes',
            'nombres'=>'required|max:200',
            'apellido_p'=>'required|',
            'apellido_m'=>'required|',
            'curp'=>'required|unique:aspirantes',
            'correo'=>'required|unique:aspirantes|email',
            'telefono'=>'required',
            'localidad'=>'required',
            'genero'=>'required',
            'id_procedencia'=>'required',
            'id_carrera'=>'required'
        ]);
        $nuevoFolio = 'UTC' . now()->format('m') . uniqid();
        // aqui primero capturamos el folio que antes teniamos creado
        $aspirante = new Aspirantes;
        $aspirante->folio = $nuevoFolio;
        $aspirante->nombres= $request->nombres;
        $aspirante->apellido_p= $request->apellido_p;
        $aspirante->apellido_m= $request->apellido_m;
        $aspirante->curp= $request->curp;
        $aspirante->correo= $request->correo;
        $aspirante->telefono= $request->telefono;
        $aspirante->localidad= $request->localidad;
        $aspirante->genero= $request->genero;
        $aspirante->id_procedencia= $request->id_procedencia;
        $aspirante->id_carrera= $request->id_carrera;
        $aspirante->save(); 
        return back()->with('success','Aspirante Validado con Exito');
    }


    public function show($id)
    {
        //la funcion show nos sirve para que podamos ver un registro en especifico
        // caba recalcar que este registro ya debe de estar creado anteriormente 
        // por eso es que tiene el parametro para que sepa que por medio del id se va a guiar

        $aspirante = Aspirantes::find($id);
        // en esta parte es donde el controlador va a buscar cual es el registro que va 
        // a tomar, esto lo hace con la metodo find y como parametro el id del registro
        $procedencias = Procedencias::all();
        // aqui le dicimos que usaremos tambien el modelo de proicedencias ya que usamos
        // datos de esta tabla. 
        $carreras = Carreras::all();
        // lo mismo para con carreras 
        return view('aspirantes.edtAspi', compact('aspirante', 'procedencias', 'carreras'));
        // ya en este parte lo que hace es que nos retornara una vista una vez de que el
        // registro sea encontrado y con el compact usamos las variables antes declaradas
        // para poder usarlas en la vista y presentar los datos.
    }


    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //la funcion update es la que nos servira para que podamos hacer actualizaciones 
        // de los registros en la base de datos vemos que usa 2 parametros el request y el id
        // el id es para saber que es uno en especifico y no todos y por parte de request
        // es para que tome los datos que el usuario cambio.
        $aspirante = Aspirantes::find($id);
        // primero busca en el modelo basandose del id
        $aspirante->fill($request->input())->saveOrFail();
        // aqui una vez que el usuario capture sus datos en los input o select,
        // por el metodo fill, este es para que no se genere un registro nuevo si no que se 
        // conserve el mismo pero con los cambios y los cambios son efectuados por el metodo
        // saveOrFile
        return redirect('aspirante');
        // y por ultimo solo redireccionamos a la vista de aspirante del index
    }


    public function destroy($id)
    {
        //la funcion destoy es para eliminar un registro antes creado este al igual 
        // que show y update tiene un parametro id que es para borrar uno es especifico 
        $aspirante = Aspirantes::find($id);
        // primero buscamos al alumno por el id 
        $aspirante->delete();
        // una ves que se encuentre lo que pasa es que ese aspirante solo se eliminara 
        // con el metodo delete y de esta forma todos sus registros ya no estara en la base de datos
        return redirect('aspirante');
        // al firnal solo redireccionamos a la vista del index
    }

    public function nota($id)
    {
        // esta es una funcion aparte del controlador ya que esta nosotros la creamos 
        // para poder usar Fpdf pero como es para que podamos hacer de un registro
        // en especifico 
        $aspirante = Aspirantes::find($id);
        // primero buscamos el registro por id para que se puede mostrar en el pdf
        $procedencia = Procedencias::all();
        // generamos instancia de las procedencias para poder usarlas mas adelante
        $carrera = Carreras::all();
        // generamos instancia igual de carrreas
        $pdf = new Fpdf('p', 'mm', 'Letter');
        // aqui generamos el pdf y damos el formato a la hoja 
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);
        // tipo de fuente y tamaño


        //Ancho,Alto,Valor impreso, Borde(0,1.'T','B','R','L'), Comportamiento(0,1), Alineacion('R','L','C','J')
        $pdf->Cell(250, 3, utf8_decode('UNIVERSIDAD TECNOLÓGICA DEL CENTRO'), 0, 1, 'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(250, 3, 'DEPARTAMENTO DE SERVICIOS ESCOLARES', 0, 1, 'C');


        //insertamos de logo
        $pdf->Image(public_path() . '/img/LogoOf.png', 11, 5, 32);
        $pdf->Ln(20);

        // Aqui empezaremos a hacer el formato para que se rellenen los campos
        // con los datos de los aspirantes

        // label de encabezado de cada uno de los campos en donde se rellena sus datos del alumno
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Folio:', 0, 0, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Nombres del Alumno:', 0, 1, 'L');
        $pdf->Ln(2);

        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);


        $pdf->Cell(80, 10, $aspirante->folio, 1, 0, 'L');
        //Celda vacia alado del titulo de la tabla
        $pdf->Cell(24, 5, '', 0, 0);
        $pdf->Cell(80, 10, $aspirante->nombres, 1, 1, 'L');


        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Apellido Paterno:', 0, 0, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Apellido Materno:', 0, 1, 'L');
        $pdf->Ln(2);

        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Cell(80, 10, $aspirante->apellido_p, 1, 0, 'L');
        //Celda vacia alado del titulo de la tabla
        $pdf->Cell(24, 5, '', 0, 0);
        $pdf->Cell(80, 10, $aspirante->apellido_m, 1, 1, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Curp:', 0, 0, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Correo:', 0, 1, 'L');
        $pdf->Ln(2);

        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Cell(80, 10, $aspirante->curp, 1, 0, 'L');
        //Celda vacia alado del titulo de la tabla
        $pdf->Cell(24, 5, '', 0, 0);
        $pdf->Cell(80, 10, $aspirante->correo, 1, 1, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, utf8_decode('Teléfono:'), 0, 0, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Localidad:', 0, 1, 'L');
        $pdf->Ln(2);

        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Cell(80, 10, $aspirante->telefono, 1, 0, 'L');
        //Celda vacia alado del titulo de la tabla
        $pdf->Cell(24, 5, '', 0, 0);
        $pdf->Cell(80, 10, $aspirante->localidad, 1, 1, 'L');


        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Genero:', 0, 0, 'L');

        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Escuela de Procedencia:', 0, 1, 'L');
        $pdf->Ln(2);

        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Cell(80, 10, $aspirante->genero, 1, 0, 'L');
        //Celda vacia alado del titulo de la tabla
        $pdf->Cell(24, 5, '', 0, 0);

        foreach ($procedencia as $row) {
            if ($row->id == $aspirante->id_procedencia) {
                $pdf->Cell(80, 10, $row->nombre_esc, 1, 1, 'L');
            }
            // aqui es donde hacemos uso de la instancia antes generada porque 
            // va a traer la precedencia basandose del id pero en vez del id mostrar 
            // la escuela de procedencia 
        }
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 15, 'Carrera:', 0, 1, 'L');



        // campo en donde se va a llenar con datos de la DB
        $pdf->Cell(4, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 9);
        foreach ($carrera as $row) {
            if ($row->id == $aspirante->id_carrera) {
                $pdf->Cell(80, 10, $row->nombre_carrera, 1, 1, 'L');
            }
            // lo mismo pasa aqui con base a la instancia generada basandose del id
            // va a tarer el nombre de la carrrera 
        }



        $pdf->Output();
        exit;
    }
}
