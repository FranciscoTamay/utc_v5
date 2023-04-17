<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class CedulaInscripcionController extends Controller
{
    public function hojares()
    {
        //    return 'hola rporte';
        $fpdf = new FPDF();
        $fpdf->AddPage();
        $fpdf->Image('img/utc.png', 10, 5, -300);
        $fpdf->setfont('arial', 'B', 10);
        $fpdf->Cell(180, 3, utf8_decode('Departamento de Servicios Escolares'), 0, 1, 'C');
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(180, 10, utf8_decode('Cedula de prescripcion'), 0, 1, 'C');
        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->Cell(150, 9, 'Folio:', 0, 0, 'R');
        $fpdf->Cell(40, 10, '', 'B', 1, 'R');
        $fpdf->SetFont('Arial', 'u', 9);
        $fpdf->Cell(150, 9, 'Fecha:', 0, 0, 'R');
        $fpdf->Cell(40, 10, '', 'B', 1, 'R');
        $fpdf->setfont('Arial', 'B', 0);
        $fpdf->Cell(20, 10,  utf8_decode('Carrera de su elección:'), 0, 0, 'L');
        $fpdf->Cell(130, 10,  utf8_decode('Como se enteró de la univercidad:'), 0, 1, 'R');

        // tabla de carreras
        $fpdf->setfont('Arial', 'I', 6);
        $fpdf->Cell(80, 5,  utf8_decode('T.S.U Administraccion área Formulacion y Evaluación de Proyectos:'), 1, 0, 'L');
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(10, 5, '',  0, 0, 'C');
        $fpdf->Cell(40, 5,  utf8_decode('Visita a mi plantel:'), 1, 0, 'R');
        $fpdf->Cell(10, 5, '',  1, 1, 'C');
        $fpdf->Cell(80, 5,  utf8_decode('T.S.U en Gastronomía:'), 1, 0, 'L');
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(10, 5, '',  0, 0, 'C');
        $fpdf->Cell(40, 5,  utf8_decode('Redes sociales:'), 1, 0, 'R');
        $fpdf->Cell(10, 5, '',  1, 1, 'C');
        $fpdf->Cell(80, 5,  utf8_decode('T.S.U en mantenimiento área industrial:'), 1, 0, 'L');
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(10, 5, '',  0, 0, 'C');
        $fpdf->Cell(40, 5,  utf8_decode('Volantes/lonas:'), 1, 0, 'R');
        $fpdf->Cell(10, 5, '',  1, 1, 'C');
        $fpdf->Cell(80, 5,  utf8_decode('T.S.U Tecnologias de la Informacion area de desarollo de software Multiplataforma'), 1, 0, 'L');
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(10, 5, '',  0, 0, 'C');
        $fpdf->Cell(40, 5,  utf8_decode('Perifoneo:'), 1, 0, 'R');
        $fpdf->Cell(10, 5, '',  1, 1, 'C');
        $fpdf->Cell(80, 5,  utf8_decode('T.S.U en Turismo área Hoteleria'), 1, 0, 'L');
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(10, 5, '',  0, 0, 'C');
        $fpdf->Cell(40, 5,  utf8_decode('Alumno/&Docente de la UTC'), 1, 0, 'R');
        $fpdf->Cell(10, 5, '',  1, 1, 'C');
        $fpdf->Cell(10, 4, '',  0, 1, 'C');
        //  DATOS GENMERALES
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(20, 10,  utf8_decode('DATOS GENERALES:'), 0, 1, 'L');
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(15, 5, 'NOMBRE', 0, 0);
        $fpdf->Cell(60, 3, '', 'B', 0, 'L');
        $fpdf->Cell(10, 5, 'EDAD', 0, 0);
        $fpdf->Cell(20, 3, '', 'B', 0, 'L');
        $fpdf->Cell(15, 5, 'GENERO', 0, 0);
        $fpdf->Cell(5, 5, 'H', 0, 0);
        $fpdf->Cell(5, 5, '', 1, 0);
        $fpdf->Cell(5, 5, 'M', 0, 0);
        $fpdf->Cell(5, 5, '', 1, 0);
        $fpdf->Cell(18, 5, 'FECHA NAC.', 0, 0);
        $fpdf->Cell(20, 3, '', 'B', 1, 'L');
        $fpdf->setfont('Arial', 'B', 4);
        $fpdf->Cell(28, 3, 'PATERNO', 0, 0, 'R');
        $fpdf->Cell(20, 3, 'MATERNO', 0, 0, 'R');
        $fpdf->Cell(20, 3, 'NOMBRE(S)', 0, 0, 'R');
        $fpdf->Cell(95, 3, 'DIA', 0, 0, 'R');
        $fpdf->Cell(5, 3, 'MES', 0, 0, 'R');
        $fpdf->Cell(5, 3, 'AÑO', 0, 1, 'R');
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(10, 10, 'CURP', 0, 0);
        $fpdf->Cell(70, 7, '', 'B', 0, 'L');
        $fpdf->Cell(10, 10, 'NSS', 0, 0);
        $fpdf->Cell(70, 7, '', 'B', 1, 'L');
        $fpdf->Cell(15, 10, 'Dirreccion', 0, 0);
        $fpdf->Cell(70, 7, '', 'B', 0, 'L');
        $fpdf->Cell(15, 10, 'Localidad:', 0, 0);
        $fpdf->Cell(30, 7, '', 'B', 0, 'L');
        $fpdf->Cell(15, 10, 'Municipio:', 0, 0);
        $fpdf->Cell(30, 7, '', 'B', 1, 'L');
        $fpdf->Cell(15, 10, 'Telefono', 0, 0);
        $fpdf->Cell(50, 7, '', 'B', 0, 'L');
        $fpdf->Cell(28, 10, 'Correo electronico', 0, 0);
        $fpdf->Cell(80, 7, '', 'B', 1, 'L');
        $fpdf->Cell(40, 10, 'Habla maya ou otro dialecto', 0, 0);
        $fpdf->Cell(10, 7, '', 'B', 0, 'L');
        $fpdf->Cell(10, 10, utf8_decode('¿Cual?'), 0, 0);
        $fpdf->Cell(30, 7, '', 'B', 0, 'L');
        $fpdf->Cell(45, 10, 'Presentas alguna discapacidad', 0, 0);
        $fpdf->Cell(10, 7, '', 'B', 0, 'L');
        $fpdf->Cell(20, 10, 'De que tipo', 0, 0);
        $fpdf->Cell(15, 7, '', 'B', 1, 'L');
        $fpdf->Cell(10, 10, 'Tutor', 0, 0);
        $fpdf->Cell(80, 7, '', 'B', 0, 'R');
        $fpdf->Cell(18, 10, 'Parentesco', 0, 0);
        $fpdf->Cell(20, 7, '', 'B', 0, 'L');
        $fpdf->Cell(18, 10, 'Telefono', 0, 0);
        $fpdf->Cell(40, 7, '', 'B', 1, 'L');

        // ANTEC. ACADEMICOS
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(20, 10,  utf8_decode('ATECEDENTES ACADEMICOS:'), 0, 1, 'L');
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(35, 5, 'Escuela de procedencia', 0, 0);
        $fpdf->Cell(60, 4, '', 'B', 0, 'L');
        $fpdf->Cell(15, 5, 'Localidad', 0, 0);
        $fpdf->Cell(30, 4, '', 'B', 0, 'L');
        $fpdf->Cell(15, 5, 'Municipio', 0, 0);
        $fpdf->Cell(30, 4, '', 'B', 1, 'L');
        $fpdf->Cell(20, 10, 'Especialidad', 0, 0);
        $fpdf->Cell(50, 7, '', 'B', 0, 'L');
        $fpdf->Cell(15, 10, 'Periodo', 0, 0);
        $fpdf->Cell(40, 7, '', 'B', 0, 'L');
        $fpdf->Cell(15, 10, 'Promedio', 0, 0);
        $fpdf->Cell(15, 7, '', 'B', 0, 'L');
        $fpdf->Cell(10, 10, 'beca', 0, 0);
        $fpdf->Cell(20, 7, '', 'B', 1, 'L');
        $fpdf->Cell(40,10,'',0,1);

        // docum.entregar
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(60, 10,  utf8_decode('DOCUMENTACIÓN ENTREGADA:'), 0, 1, 'L');
        $fpdf->Cell(60,5,'',0,0);
        $fpdf->setfont('Arial', 'B', 8);
        $fpdf->Cell(30, 5, '',  0, 0, 'C');
        $fpdf->Cell(70,5,'Bajo protesta de decir verdad minifiesto que me hago responsable',0,1);
        $fpdf->Cell(60, 5, 'Copia del certificado', 1, 0);
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(20, 5, '',  0, 0, 'C');
        $fpdf->Cell(60, 5,  'de la veracidad de la informacion proporcionada, asi como de la', 0, 1);
        $fpdf->Cell(60, 5, 'Constacia de estudios de Bchillerato', 1, 0);
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(20, 5, '',  0, 0, 'C');
        $fpdf->Cell(60,5,'documentacion entregada al departamento de Servicios Escolares',0,1);
        $fpdf->Cell(60, 5, 'Copia de la CURP', 1, 0);
        $fpdf->Cell(10, 5, '',  1, 0, 'C');
        $fpdf->Cell(20, 5, '',  0, 0, 'C');
        $fpdf->Cell(60,5,'de la Univercidad Tecnologica del Centro.',0,1);
        $fpdf->Cell(100, 5, '',  0, 0, 'C');
        $fpdf->Cell(70, 7, '', 'B', 1, 'L');
        $fpdf->Cell(100, 5, '',  0, 0, 'C');
        $fpdf->Cell(70, 7, 'Aspirante', 0,1, 'C');
        $fpdf->Cell(60,50,'Sello de Servuicios Escolares',0,0);
        $fpdf->Cell(50, 5, '',  0, 0, 'C');
        $fpdf->Cell(60, 50, 'Sello de Administracion y Finanzas', 0,1, );
       
        $fpdf->setfont('Arial', 'B', 7);
        $fpdf->Cell(70,-40,'La univercidad Tecnologica del Centro recabara datos persomales de indentificacion con el proposito de cumplir con las obligaciones',0,1);
        $fpdf->Cell(70,50,'derivadas de la relacion contraidas a partir de su ingreso como estudiante de la UTC.',0,1);
        $fpdf->Output();

        exit;
    }
}
