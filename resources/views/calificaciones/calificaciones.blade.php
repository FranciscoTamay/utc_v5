<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="all-css/bootstrap.css">
  <link rel="icon" type="image/png" href="img/utc.png">

  <title>UTC</title>
</head>

<body class="body">
  <div class="contenedor">
    <div class="encabezado">
      <div class="title">
        Acta de calificaciones finales
      </div>
    </div>

    <form action="">
      <label for="" class="label1">Carrera:</label>
      <input type="text" class="form_input">

      <select name="" class="" required>
        <option class="" value="">Carrera</option>
        @foreach($carreras as $row)
        <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
        @endforeach
      </select>

      <label for="" class="label2">Asignatura:</label>
      
      <!-- aqui comeinza el select para traer las asignaturas -->
      <select name="" class="" required>
        <option class="" value="">Asignaturas</option>
        @foreach($asignaturas as $row)
        <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
        @endforeach
      </select>
      <!-- fin del select para traer las materias -->
      <span class="texto_simbo">SIMBOLOGIA</span>
      <span class="texto_simbol">SIMBOLOGIA NIVELES DE DESEMPEÑO</span>
    </form>

    <form action="">
      <label for="" class="label3">Grupo:</label>
      
      <!-- selec para grupos -->
      <select name="" class="" required>
        <option class="" value="">Grupos</option>
        @foreach($grupos as $row)
        <option value="{{$row->id}}">{{$row->id}}</option>
        @endforeach
      </select>
      <!-- fin del select -->

      <label for="" class="label4">Docente:</label>
      <input type="text" class="form_input">
      <select name="" class="" required>
        <option class="" value="">Asignaturas</option>
        @foreach($maestros as $row)
        <option value="{{$row->id}}">{{$row->nombres}}</option>
        @endforeach
      </select>
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

    <div class="tabla">
      <table class="table table-bordered ">

        <!--inicio de primer fila-->
        <thead class="thead-dark">
          <th>Composicion de la evalucacion de la unidad</th>
          <th>Estatus</th>
          <th>Calificacion de unidades de aprendizaje</th>
          <th>Calificaciones de unidades en ordinario y gobales</th>
          <th>Calificacion Asignatura</th>
          <th>Calificacion Asignatura</th>
          <th>Calificacion Asignatura</th>
          <th>Calificacion Asignatura</th>
          <th>Nivel de</th>
        </thead>
        <!--fin de primer fila-->

        <!--inicio de segunda fila-->
        <thead class="thead-dark">
          <th>Indicador</th>
          <th></th>
          <th>
            <div class="container">
              <div class="row">
                <div class="cold">
                  1
                </div>
                <div class="cold_2">
                  2
                </div>
                <div class="cold">
                  3
                </div>
                <div class="cold_2">
                  4
                </div>
                <div class="cold">
                  5
                </div>
                <div class="cold_2">
                  6
                </div>
              </div>
            </div>
          </th>
          <th>
            <div class="container">
              <div class="row">
                <div class="cold">
                  1
                </div>
                <div class="cold_2">
                  2
                </div>
                <div class="cold">
                  3
                </div>
                <div class="cold_2">
                  4
                </div>
                <div class="cold">
                  5
                </div>
                <div class="cold_2">
                  6
                </div>
              </div>
            </div>
          </th>
          <th>Final</th>
          <th>Final</th>
          <th>Final</th>
          <th>Promedio Final</th>
          <th>Desempeño</th>
        </thead>
        <!--fin de segunda fila-->

        <!--inicio de tercer fila-->
        <thead class="thead-dark">
          <th>
            <div class="container">
              <div class="row">
                <div class="col-4" style="background-color:white">
                  Matricula
                </div>
                <div class="col-8">
                  Nombre del alumno
                </div>
              </div>
            </div>
          </th>
          <th></th>
          <th>
            <div class="container">
              <div class="row">
                <div class="col-2">
                  20%
                </div>
                <div class="col-2">
                  30%
                </div>
                <div class="col-2">
                  50%
                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="cold">

                </div>
              </div>
            </div>
          </th>
          <th>
            <div class="container">
              <div class="row">
                <div class="col-2">
                  20%
                </div>
                <div class="col-2">
                  30%
                </div>
                <div class="col-2">
                  50%
                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="col">

                </div>
              </div>
            </div>
          </th>
          <th>U.A/ORD</th>
          <th>Remedial</th>
          <th>Remedial</th>
          <th></th>
          <th></th>
        </thead>
        <!--fin de tercer fila-->

        <tbody>
          <tr>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col-4">20212295</div>
                  <div class="col-8">David Azael Cutz Chan</div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">A</td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">9.0</td>
            <td></td>
            <td></td>
            <td style="font-size: 10px;">9.0</td>
            <td style="font-size: 10px;">DE</td>
          </tr>
        </tbody>


        <!--pruebas-->
        <tbody>
          <tr>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col-4">20212294</div>
                  <div class="col-8">Francisco Javier Tamay Canul</div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">A</td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">9.0</td>
            <td></td>
            <td></td>
            <td style="font-size: 10px;">9.0</td>
            <td style="font-size: 10px;">DE</td>
          </tr>
        </tbody>

        <tbody>
          <tr>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col-4">20212290</div>
                  <div class="col-8">Oscar Aldair Matu Miranda</div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">A</td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">9.0</td>
            <td></td>
            <td></td>
            <td style="font-size: 10px;">9.0</td>
            <td style="font-size: 10px;">DE</td>
          </tr>
        </tbody>

        <tbody>
          <tr>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col-4">20212289</div>
                  <div class="col-8">Hector Eduardo Ortiz Can</div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">A</td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td>
              <div class="container" style="font-size: 10px;">
                <div class="row">
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col">9.0</div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            </td>
            <td style="font-size: 10px;">9.0</td>
            <td></td>
            <td></td>
            <td style="font-size: 10px;">9.0</td>
            <td style="font-size: 10px;">DE</td>
          </tr>
        </tbody>
        <!--fin de pruebas-->
      </table>
    </div>
  </div>
</body>

</html>