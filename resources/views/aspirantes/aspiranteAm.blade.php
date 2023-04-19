
<!-- Aqui empieza el fomrulario  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all-css/aspirantes.css">
    <link rel="icon" type="image/png" href="img/utc.png">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- fin -->
    <title>UTC</title>
</head>
<body>
    <div class="container">
        <div class="title">Bienvenido a la UTC
            <img class="logo" src="img/utc.png" alt="">
        </div>
        <form id="frmServicios" method="POST" action="{{url('asp')}}">
        @csrf
        <!--en el formulario de aqui vemos que tiene el metodo post
            este es el que se va a encarhar que una vez que el usuario llene
            todo los campos los enviara al controlador para que sean guardados -->
            <div class="form-group">
                <span>Folio</span>
                <input type="text" disabled value="{{ $nuevoFolio }}" name="folio" placeholder="Folio" required>
                <!-- vemos que cada uno de los input tiene un name  -->

            </div>
            <div class="form-group">
                <span>Nombre Completos</span>
                <input type="text" name="nombres" placeholder="Nombres" required>
            </div>
            <div class="form-group">
                <span>Apellido Paterno</span>
                <input type="text" name="apellido_p" placeholder="Apellidos Paternos" required>
            </div>
            <div class="form-group">
                <span>Apellido Materno</span>
                <input type="text" name="apellido_m" placeholder="Apellidos Maternos" required>
            </div>
            <div class="form-group">
                <span>Curp</span>
                <input type="text" name="curp" placeholder="Curp" required>
            </div>
            <div class="form-group">
                <span>Correo</span>
                <input type="mail" name="correo" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <span>Telefono</span>
                <input type="text" name="telefono" placeholder="Telefono" required>
            </div>
            <div class="form-group">
                <span>Localidad</span>
                <input type="text" name="localidad" placeholder="Localidad" required>
            </div>
            <div class="form-group">
                <span>Genero</span>
                <select name="genero" class="form-group2" required>
                            <option value="">SELECCIONA UN GENERO</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>


                </select>
            </div>
            <div class="form-group">
                <span>Procedencia</span>
                <select name="id_procedencia" class=" aspirante form-group2" required>
                            <option value="">SELECCIONA LA PROCEDENCIA</option>
                            @foreach($procedencias as $row)
                            <option value="{{$row->id}}">{{$row->nombre_esc}}</option>
                            @endforeach

                </select>
            </div>
            <div class="form-group">
                <span>Carrera</span>
                <select name="id_carrera" class="aspirante form-group2" required>
                            <option value="">SELECCIONA LA CARRERA</option>
                            @foreach($carreras as $row)
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @endforeach

                </select>
            </div>
            <button class="button"> Guardar</button>
        </form>
    </div>
    <script>
    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
</body>
</html>
<!-- Aqui finaliza el formulario  -->



