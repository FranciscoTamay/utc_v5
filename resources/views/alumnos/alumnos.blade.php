@extends('layouts.app')
@section('content')
<div class="section mt-4">

    <div class="card-body">
        <h2 class="title-2">Alumnos</h2>
        <div class="row mt-1 mb-5">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">
                    <br>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                        <i class="fa-solid fa-circle-plus"></i> Añadir
                    </button>
                </div>
            </div>
        </div>

        <div class="respon">
            <table id="pro5" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-white text-center">
                    <tr>
                        <th class="inico text-center">ID</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">APELLIDO PATERNO</th>
                        <th class="text-center">APELLIDO MATERNO</th>
                        <th class="text-center">CURP</th>
                        <th class="text-center">NSS</th>
                        <th class="text-center">GENERO</th>
                        <th class="text-center">TELEFONO</th>
                        <th class="text-center">CORREO</th>
                        <th class="text-center">DIRECCION</th>
                        <th class="text-center">LOCALIDAD</th>
                        <th class="fin text-center">MUNICIPIO</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($alumnos as $run)
                       <!-- hay vistas como esta en donde se ve la tabla pero en los td
                                estan unas llaves abiertas {{$run->dato}} es que en la parte de
                                arriba en el foreach lo que hacemos es que por medio de lo que haya en 
                                en la variable que tiene un signo de peso va a recorrer y llenar los datos
                                de abajo nosotros tenemos puesto un $variable as $run ese as run es la forma
                                en la que tu puedas llamar la variable por la que vas a imprimir en la tabla
                                podrias ser otra cosa o el mismo nombre simplemnte es para generar instancia -->
                                <td>{{$i++}}</td>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->nombres}}</td>
                        <td>{{$run->apellido_paterno}}</td>
                        <td>{{$run->apellido_materno}}</td>
                        <td>{{$run->curp}}</td>
                        <td>{{$run->num_seguro}}</td>
                        <td>{{$run->sexo}}</td>
                        <td>{{$run->telefono}}</td>
                        <td>{{$run->correo}}</td>
                        <td>{{$run->direccion}}</td>
                        <td>{{$run->localidad}}</td>
                        <td>{{$run->municipio}}</td>

                        <td>
 <!-- aqui es como vemos $variable antes definida y apuntamos a que es lo que quieres
                            que imprima, lo que este va a imprimir tiene que estar en la base de datos porque
                            si a lo que apuntamos no esta en la base de datos o esta vacio no se mostrara nada en la tabla -->
                            <div class="d-inline-block me-2">
                                <a href="{{ url('alumnos',[$run]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <!-- boton de editar -->

                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('alumnos',[$run] )}}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
<!-- en el select le tenemos puesto un foreach para que este recorra el objeto
                                una ves que lo haga mostrara todos los elementos que contenga para que el
                                usuario pueda seleccionar -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un Alumno</h1>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                
                <form id="frmAlumnos" method="post" action="guardarAlumno" novalidate>
                    @csrf
                    <div class="row">
                    <strong class="p-2 col-lg">Todos los campos con <span class="text-danger fs-6">*</span> son requeridos</strong>
                    </div>
                    
                    <strong>CURP</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="curp" class="form-control @error('curp') is-invalid @enderror" value="{{old('curp')}}" maxlength="18" placeholder="CURP del Alumno">
                        @error('curp')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>NSS</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="num_seguro" class="form-control @error('num_seguro') is-invalid @enderror" value="{{old('num_seguro')}}" maxlength="10" placeholder="NSS del alumno" >
                        @error('num_seguro')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>Apellido Paterno</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{old('apellido_paterno')}}" maxlength="120" placeholder="Apellido Paterno del Alumno" >
                        @error('apellido_paterno')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>Apellido Materno</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{old('apellido_materno')}}" maxlength="120" placeholder="Apellido Materno del Alumno" >
                        @error('apellido_materno')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        
                    </div>


                    <strong>Nombres</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{old('nombres')}}" maxlength="120" placeholder="Nombres del Alumno" >
                        @error('nombres')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <strong>Sexo</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <!-- <input type="text" name="sexo" class="form-control" maxlength="120" placeholder="Nombres del Alumno" required> -->
                        <select name="sexo" id="" class="form-control @error('sexo') is-invalid @enderror" value="{{old('sexo')}}" >
                            <option value="">Seleccione su sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        @error('sexo')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>



                    <strong>Telefono</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono')}}" maxlength="10" placeholder="Número del Alumno" >
                        @error('telefono')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    
                    <strong>Correo</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{old('correo')}}" maxlength="120" placeholder="Correo del Alumno" >
                        @error('correo')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <strong>Direccion</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion')}}" maxlength="120" placeholder="Direccion del Alumno" >
                        @error('direccion')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    
                    <strong>Localidad</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="localidad" class="form-control @error('localidad') is-invalid @enderror" value="{{old('localidad')}}" maxlength="120" placeholder="Localidad del Alumno" >
                        @error('localidad')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <strong>Municipio</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="municipio" class="form-control @error('muncipio') is-invalid @enderror" value="{{old('municipio')}}" maxlength="120" placeholder="Municipio del Alumno" >
                        @error('municipio')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 mx-auto">
                        <input type="submit" class="btn btn-outline-success btn-lg" name="" id="" value="Enviar">
                            <!-- boton de guardar -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- FIN DE SECCION -->
<script>
    $(document).ready(function() {
        $('#pro5').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: "Bfrtip",
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-success offset-md-4 mb-4 mt-4 '
                    }
                },
                buttons: [{
                    //definimos estilos del boton de excel
                    extend: "excel",
                    text: 'Descargar',
                    className: 'btn btn-success',
                    excelStyles: {

                        "template": [
                            "blue_medium",
                            "header_green",
                            "title_medium"
                        ]

                    },
                }]
            },
            fixedHeader: {
                header: false,
                footer: false
            },
            language: {
                searchPlaceholder: "Buscar",
                search: "Buscar:",
                zeroRecords: "No se encontraron resultados",
                emptyTable: "No hay datos disponibles en la tabla",
                infoEmpty: "Mostrando 0 registros de un total de 0",
                infoFiltered: "(filtrado de un total de MAX registros)",
                lengthMenu: "Mostrar MENU registros por página",
                example_info: "Se muestran 0 de 0 un total de 0",
                sInfo: "<span style='margin-left: 2rem;'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</span>",
                paginate: {
                    previous: "Anterior",
                    next: "Siguiente"
                }
            },
            columnDefs: [{
                targets: -1,
                className: 'actions',
                searchable: false
            }],
            initComplete: function() {
                this.api().columns().every(function(index) {
                    var column = this;
                    var header = $(column.header());
                    if (header.hasClass('actions')) {
                        // No hacer nada si es la columna de acciones
                        return;
                    }
                    var input = $('<input type="text" class="text-center form-control form-control-sm mb-2" placeholder="Buscar ">')
                        .appendTo(header)
                        .on('keyup change clear', function() {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
            }
        });

    });
    const inputNumSeguro = document.querySelector('input[name="num_seguro"]');

    inputNumSeguro.addEventListener('input', () => {
        const maxLength = 10;
        if (inputNumSeguro.value.length > maxLength) {
            inputNumSeguro.value = inputNumSeguro.value.slice(0, maxLength);
        }
    });
    const inputtelefono = document.querySelector('input[name="telefono"]');

inputNumSeguro.addEventListener('input', () => {
    const maxLength = 10;
    if (inputNumSeguro.value.length > maxLength) {
        inputNumSeguro.value = inputNumSeguro.value.slice(0, maxLength);
    }
});
</script>
@endsection()