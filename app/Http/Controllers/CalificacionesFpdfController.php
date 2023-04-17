<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class CalificacionesFpdfController extends Controller
{
    ///
    public function calificacion(){
        //    return 'hola rporte';
         $fpdf = new FPDF('L','mm','Letter');
            $fpdf->AddPage();
            $fpdf->Image('img/utc.png', 10, 5, -300);    
            $fpdf->setfont('arial','B',14);
            $fpdf->Cell(180, 3, utf8_decode('UNIVERSIDAD TECNOLOGICA DEL CENTRO'), 0, 1, 'C');
            $fpdf->SetFont('Arial', 'B', 10);
            $fpdf->Cell(180, 10, utf8_decode('ACTA DE CALIFICACIONES FINALES'), 0, 1, 'C');

            $fpdf->setfont('Arial','B',7);
            $fpdf->Cell(20,8,  utf8_decode('Carrera:'),0,0,'L');
            $fpdf->ln();
            $fpdf->Cell(20,8,  utf8_decode('Grupo:'),0,0,'L');
            $fpdf->ln();
            $fpdf->Cell(20,8,  utf8_decode('Cuatrimestre:'),0,0,'L');
            
            $fpdf->Cell(95,8,  utf8_decode('Como se enteró de la univercidad:'),0,1,'R');

            $fpdf->SetFillColor(208, 211, 212);
            $fpdf->setfont('Arial','B', 6);
            $fpdf->ln();
            // tabla de carreras
            $fpdf->Cell(5,4.5,"",1);
            $fpdf->Cell(54,4.5,"Composicion de la evaluacion de la unidad",1);
            $fpdf->Cell(15,4.5,"Estatus",1);
            $fpdf->Cell(42,4.5,"Clificacion de unidades",1);
            $fpdf->Cell(42,4.5,"Clificacion de unidades",1);
            $fpdf->Cell(20,4.5,"Clificacion",1);
            $fpdf->Cell(20,4.5,"Clificacion",1);
            $fpdf->Cell(20,4.5,"Clificacion",1);
            $fpdf->Cell(20,4.5,"Clificacion",1);
            $fpdf->Cell(23,4.5,"Nivel de desempeno",1);
            $fpdf->Ln();

            $fpdf->Cell(5,4.5,"",1);
            $fpdf->Cell(54,4.5,"Indicador",1);
            $fpdf->Cell(15,4.5,"Estatus",1);
            $fpdf->Cell(6,4.5,"1",1);
            $fpdf->Cell(6,4.5,"2",1);
            $fpdf->Cell(6,4.5,"3",1);
            $fpdf->Cell(6,4.5,"4",1);
            $fpdf->Cell(6,4.5,"5",1);
            $fpdf->Cell(6,4.5,"6",1);
            $fpdf->Cell(6,4.5,"7",1);

            $fpdf->Cell(6,4.5,"1",1);
            $fpdf->Cell(6,4.5,"2",1);
            $fpdf->Cell(6,4.5,"3",1);
            $fpdf->Cell(6,4.5,"4",1);
            $fpdf->Cell(6,4.5,"5",1);
            $fpdf->Cell(6,4.5,"6",1);
            $fpdf->Cell(6,4.5,"7",1);
            $fpdf->Cell(20,4.5,"Final",1);
            $fpdf->Cell(20,4.5,"Final",1);
            $fpdf->Cell(20,4.5,"Final",1);
            $fpdf->Cell(20,4.5,"",1);
            $fpdf->Cell(23,4.5,"",1);
            $fpdf->Ln();

            $fpdf->Cell(5,4.5,"",1);
            $fpdf->Cell(20,4.5,"Matricula",1);
            $fpdf->Cell(34,4.5,"Nombre del alumno",1);
            $fpdf->Cell(15,4.5,"Estatus",1);
            $fpdf->Cell(6,4.5,"20%",1);
            $fpdf->Cell(6,4.5,"30%",1);
            $fpdf->Cell(6,4.5,"50%",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);

            $fpdf->Cell(6,4.5,"20%",1);
            $fpdf->Cell(6,4.5,"30%",1);
            $fpdf->Cell(6,4.5,"50%",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(6,4.5,"",1);
            $fpdf->Cell(20,4.5,"U.A/ORD",1);
            $fpdf->Cell(20,4.5,"Remedial",1);
            $fpdf->Cell(20,4.5,"Especial",1);
            $fpdf->Cell(20,4.5,"Promedio final",1);
            $fpdf->Cell(23,4.5,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"1",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"2",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"3",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"4",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"5",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"6",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"7",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"8",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"9",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"10",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"11",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"12",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"13",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"14",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"15",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"16",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"17",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"18",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"19",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
            $fpdf->Ln();


            $fpdf->Cell(5,4,"20",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(34,4,"",1);
            $fpdf->Cell(15,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);

            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(6,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(20,4,"",1);
            $fpdf->Cell(23,4,"",1);
        
         $fpdf->Output();
    exit;
    }
}
