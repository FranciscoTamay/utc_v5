@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->
<section class="section mt-4">


    <div class="card-body">
        <h2 class="title-2">Maestros</h2>
        <div class="row mt-3 mb-4">
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
            <table id="pro4" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-secondary text-center" >
                    <tr>
                        <th class="inico text-center">CODIGO</th>
                        <th class="text-center">SEXO</th>
                        <th class="text-center">APELLIDO PATERNO</th>
                        <th class="text-center">APELLIDO MATERNO</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">CURP</th>
                        <th class="text-center">NSS</th>
                        <th class="text-center">RFC</th>
                        <th class="fin text-center">ID GRADO</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($maestros as $row)
                    <tr>
                        <td>{{ $row->codigo }}</td>
                        <td>{{$row->sexo}}</td>
                        <td>{{$row->apellido_paterno}}</td>
                        <td>{{$row->apellido_materno}}</td>
                        <td>{{$row->nombres}}</td>
                        <td>{{$row->curp}}</td>
                        <td>{{$row->num_seguro}}</td>
                        <td>{{$row->rfc}}</td>
                        <td>{{$row->grado_nombre}}</td>
                        <td>

                            <div class="d-inline-block me-2">
                                <a href="{{ url('maestros',[$row]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>

                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('maestros',[$row] )}}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un Maestro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmMaestros" method="post" action="guardarMaestro" novalidate>
                    <!-- en este caso llenaremos } -->
                    @csrf
                    <div class="row">
                    <strong class="p-2 col-lg">Todos los campos con <span class="text-danger fs-6">*</span> son requeridos</strong>
                    </div>

                    <strong>Codigo del Maestro</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{old('codigo')}}" maxlength="50" placeholder="Código del Profesor" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                        <!-- vemos que cada uno de los input tiene un name ese es el que se manda al controlador
                    para que pueda enviarlos a la base de datos -->
                    @error('codigo')
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
                        <select name="sexo" id="" class="form-control @error('sexo') is-invalid @enderror" value="{{old('sexo')}}" required>
                            <option value="">Seleccione el genero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('sexo')
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
                        <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{old('apellido_paterno')}}" maxlength="120" placeholder="Apellido Paterno" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
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
                        <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{old('apellido_materno')}}" maxlength="120" placeholder="Apellido Materno" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
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
                        <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{old('nombres')}}" maxlength="120" placeholder="Nombres" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '')" required>
                        @error('nombres')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>



                    <strong>CURP</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="curp" class="form-control @error('curp') is-invalid @enderror" value="{{old('curp')}}" maxlength="120" placeholder="CURP" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ0-9\s]/g, '')" required>
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
                        <input type="number" name="num_seguro" class="form-control @error('num_seguro') is-invalid @enderror" value="{{old('num_seguro')}}" maxlength="120" placeholder="NSS" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                        @error('num_seguro')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <strong>RFC</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="rfc" class="form-control @error('rfc') is-invalid @enderror" value="{{old('rfc')}}" maxlength="120" placeholder="RFC" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ0-9\s]/g, '')" required>
                        @error('rfc')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>



                    <strong>Grado del Profesor</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control @error('id_grado') is-invalid @enderror" value="{{old('id_grado')}}" name="id_grado" id="">
                            <option value="">Seleccione el grado Academico del profesor</option>
                            @foreach($grados as $row)
                            <option value="{{$row->id}}">{{$row->grado_nombre}}</option>
                            @endforeach
                        </select>
                        @error('id_grado')
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
                <!-- final del formulario -->
            </div>
        </div>
    </div>
</div>
<!-- Aqui es en donde termina la tabla de las carreras -->
<!-- Aqui empieza la ventana modal  -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro4').DataTable({
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
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
@endsection()