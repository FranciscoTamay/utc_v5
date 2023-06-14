
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
    <link href="{{ asset('all-css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- fin -->
    <title>UTC</title>
</head>
<body>
    <div class="container">
        <div class="title">Bienvenido a la UTC
            <img class="logo" src="img/utc.png" alt="">
        </div>

        <div class="row">
        <strong class="p-2 col-lg-5 ml-2">Todos los campos con <span class="text-danger fs-6">*</span> son requeridos</strong>
        </div>
        <form id="frmServicios" method="POST" action="guardarAspirante" novalidate>
        @csrf
        <!--en el formulario de aqui vemos que tiene el metodo post
            este es el que se va a encarhar que una vez que el usuario llene
            todo los campos los enviara al controlador para que sean guardados -->
            <div class="form-group">
                <span>Folio</span>
                <input type="text" class="" disabled value="{{ $nuevoFolio }}" name="folio" placeholder="Folio" required>

                <!-- vemos que cada uno de los input tiene un name ese es el que se manda al controlador
                    para que pueda enviarlos a la base de datos y lo mismo para con el select  -->

            </div>
            <div class="form-group">
                <span>Nombre Completos</span>
                <input type="text" name="nombres" class="@error('nombres') is-invalid @enderror" value="{{old('nombres')}}" placeholder="Nombres" required>
                @error('nombres')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Apellido Paterno</span>
                <input type="text" class="@error('apellido_p') is-invalid @enderror" value="{{old('apellido_p')}}" name="apellido_p" placeholder="Apellidos Paternos" required>

                @error('apellido_p')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Apellido Materno</span>
                <input type="text" class="@error('apellido_m') is-invalid @enderror" value="{{old('apellido_m')}}" name="apellido_m" placeholder="Apellidos Maternos" required>

                @error('apellido_m')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Curp</span>
                <input type="text" class="@error('curp') is-invalid @enderror" value="{{old('curp')}}" name="curp" placeholder="Curp" required>

                @error('curp')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Correo</span>
                <input type="mail" class="@error('correo') is-invalid @enderror" value="{{old('correo')}}" name="correo" placeholder="Correo" required>


                @error('correo')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Telefono</span>
                <input type="text" class="@error('telefono') is-invalid @enderror" value="{{old('telefono')}}" name="telefono" placeholder="Telefono" required>

                @error('telefono')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Localidad</span>
                <input type="text" class="@error('localidad') is-invalid @enderror" value="{{old('localidad')}}" name="localidad" placeholder="Localidad" required>


                @error('localidad')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Genero</span>
                <select name="genero" class="aspirante @error('genero') is-invalid @enderror" value="{{old('genero')}}" class="form-group2" required>
                            <option value="">Seleccione su Género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro(Tanque Sovietico T-34)</option>
                </select>

                @error('genero')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Procedencia</span>
                <select name="id_procedencia"  class=" aspirante form-group2 @error('id_procedencia') is-invalid @enderror" value="{{old('id_procedencia')}}" required>
                            <option value="">Seleccione la Escuela de Procedencia</option>
                            @foreach($procedencias as $row)
                            <option value="{{$row->id}}">{{$row->nombre_esc}}</option>
                            @endforeach
                            <!-- al igual que en los input el select tiene un name y este pasa un id 
                                porque asi es como se almacena en la base de datos ya que este pertenece 
                                a una llave foranea -->

                </select>


                @error('id_procedencia')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <span>Carrera</span>
                <select name="id_carrera" class="aspirante form-group2 @error('id_carrera') is-invalid @enderror" value="{{old('id_carrera')}}" required>
                            <option value="">Seleccione la Carrera</option>
                            @foreach($carreras as $row)
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @endforeach

                </select>

                @error('id_carrera')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="button" name="" id="" value="Enviar">
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



