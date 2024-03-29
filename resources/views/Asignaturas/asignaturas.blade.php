@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section mt-4">

    <div class="card-body">
        <h2 class="title-2">Asignaturas</h2>
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
        <div class="respon">
            <table id="pro3" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th class="inico text-center">ID</th>
                        <th class="text-center">CODIGO</th>
                        <th class="text-center">NOMBRE ASIGNATURA</th>
                        <th class="text-center">NUMERO DE UNIDADES</th>
                        <th class="fin text-center">HORAS</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($asignaturas as $run)
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
                        <td>{{$run->codigo_asignatura}}</td>
                        <td>{{$run->nombre_asignatura}}</td>
                        <td>{{$run->num_unidades}}</td>
                        <td>{{$run->horas}}</td>
                        <td>
 <!-- aqui es como vemos $variable antes definida y apuntamos a que es lo que quieres
                            que imprima, lo que este va a imprimir tiene que estar en la base de datos porque
                            si a lo que apuntamos no esta en la base de datos o esta vacio no se mostrara nada en la tabla -->
                            <div class="d-inline-block me-2">
                                <a href="{{ url('asignaturas',[$run]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <!-- boton de editar -->

                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('asignaturas',[$run] )}}">
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
<!-- en el select le tenemos puesto un foreach para que este recorra el objeto
                                una ves que lo haga mostrara todos los elementos que contenga para que el
                                usuario pueda seleccionar -->
<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una Asignatura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmAsignaturas" method="POST" action="guardarMateria">
                    @csrf
                    <div class="row">
                    <strong class="p-2 col-lg">Todos los campos con <span class="text-danger fs-6">*</span> son requeridos</strong>
                    </div>


                    <strong>Codigo de la Asignatura</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-qrcode"></i>
                        </span>
                        <input type="number" name="codigo_asignatura" class="form-control @error('codigo_asignatura') is-invalid @enderror" value="{{old('codigo_asignatura')}}" maxlength="50" placeholder="Codigo de la Asignatura" oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                        @error('codigo_asignatura')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>Nombre de la Asignatura</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-file-signature"></i>
                        </span>
                        <input type="text" name="nombre_asignatura" class="form-control @error('nombre_asignatura') is-invalid @enderror" value="{{old('nombre_asignatura')}}" maxlength="120" placeholder="Nombre de la Asignatura" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')" >
                        @error('nombre_asignatura')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>Nùmero de Unidades</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-list-ol"></i>
                        </span>
                        <input type="number" name="num_unidades" class="form-control @error('num_unidades') is-invalid @enderror" value="{{old('num_unidades')}}" maxlength="50" placeholder="Número de Unidades" oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                        @error('num_unidades')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <strong>Horas de la Asignatura</strong><span class="text-danger fs-6">*</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-arrow-down-9-1"></i>
                        </span>
                        <input type="number" name="horas" class="form-control @error('horas') is-invalid @enderror" value="{{old('horas')}}" maxlength="50" placeholder="Ingrese las horas de la asignatura" oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                        @error('horas')
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
<!-- Aqui termina la ventana modal -->
<!-- Aqui finaliza el contenido -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro3').DataTable({
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
    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>
@endsection()