<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/calificaciones.css">
    <link rel="icon" type="image/png" href="img/utc.png">
    <title>UTC</title>
</head>
<body>
    <div class="contenedor">
        <div class="encabezado">
        <div class="title">
            Universidad Tecnologica del Centro
            <p></p>
            Acta de calificaciones finales
        </div>
        </div>

        <form action="">
            <label for="" class="label1">Carrera:</label>
            <input type="text" class="form_input">

            <label for="" class="label2">Asignatura:</label>
            <input type="text" class="form_input">
            <span class="texto_simbo">SIMBOLOGIA</span>
            <span class="texto_simbol">SIMBOLOGIA NIVELES DE DESEMPEÑO</span>
        </form>

        <form action="">
            <label for="" class="label3">Grupo:</label>
            <input type="text" class="form_input">

            <label for="" class="label4">Docente:</label>
            <input type="text" class="form_input">
            <span class="texto_simbo2">O:ordinario &nbsp; G:ordinario global </span>
            <span class="texto_simbo2_1">SA:satisfactorio &nbsp; DE:destacado</span>
        </form>

        <form action="">
            <label for="" class="label5">Cuatrimestre:</label>
            <input type="text" class="form_input">

            <label for="" class="label6">Año:</label>
            <input type="text" class="form_input">
            <span class="texto_simbo3">R:remedial &nbsp; E:especial</span>
            <span class="texto_simbo3_1">AU:autonomo &nbsp; NA:no acreditado</span>
        </form>

        <table id="pro" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-respon text-center">
                    <tr>
                        <th scope="col" class="text-center text-black">FOLIO</th>
                        <th scope="col" class="text-center text-black">NOMBRES</th>
                        <th scope="col" class="text-center text-black">APELLIDOS PATERNO</th>
                        <th scope="col" class="text-center text-black">APELLIDOS MATERNO</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td class="text-center  fw-bold text-black"></td>
                        <td class="text-center  fw-bold text-black"></td>
                        <td class="text-center  fw-bold text-black"></td>
                        <td class="text-center  fw-bold text-black"></td>
                        <td class="text-center">
                            <div class="d-inline-block me-2">
                                <a href="" class="btn bg-warning"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="d-inline-block">
                                <form method="POST" action="">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</body>
</html>