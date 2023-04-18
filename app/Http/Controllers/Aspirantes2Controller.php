<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;
use App\Models\Carreras;
use App\Models\Procedencias;
use Codedge\Fpdf\Fpdf\Fpdf;

class Aspirantes2Controller extends Controller
{

    public function index()
    {
        //
        $nuevoFolio = 'UTC' . now()->format('m') . uniqid();
        $carreras = Carreras::all();
        $procedencias = Procedencias::all();
        $aspirantes = Aspirantes::select('aspirantes.id', 'folio', 'nombres', 'apellido_p', 'apellido_m', 'curp', 'correo', 'telefono', 'localidad', 'genero', 'id_procedencia', 'id_carrera', 'nombre_carrera', 'nombre_esc')
            ->join('carreras', 'carreras.id', '=', 'aspirantes.id_carrera',)
            ->join('procedencia', 'procedencia.id', '=', 'aspirantes.id_procedencia')->get();
        return view('aspirantes.aspiranteAm', compact('aspirantes', 'procedencias', 'carreras'))->with('nuevoFolio', $nuevoFolio);
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //

        $nuevoFolio = 'UTC' . now()->format('Ymd') . uniqid();
        $aspirante = new Aspirantes($request->input());
        $aspirante->folio = $nuevoFolio;
        $aspirante->saveOrFail();

        return redirect('aspirante');
    }


    public function show($id)
    {
        //

        $aspirante = Aspirantes::find($id);
        $procedencias = Procedencias::all();
        $carreras = Carreras::all();
        return view('aspirantes.edtAspi', compact('aspirante', 'procedencias', 'carreras'));
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
        return redirect('aspirante');
    }


    public function destroy($id)
    {
        //
        $aspirante = Aspirantes::find($id);
        $aspirante->delete();
        return redirect('aspirante');
    }

    public function nota($id)
    {
        $aspirante = Aspirantes::find($id);
        $procedencia = Procedencias::all();
        $carrera = Carreras::all();
        $pdf = new Fpdf('p', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);


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
        }



        $pdf->Output();
        exit;
    }
}
