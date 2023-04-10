@extends('layouts.app')
@section('content')
<!-- Aqui comienza el contenido -->

<div class="section mt-4">
    <!-- FIN DEL CARD DEL SECTION (ES PARA QUE NO SE VEA TAN PEGADO AL HEADER ) -->

    <!-- aqui es en donde termina el boton para abrir el modal de carreras -->
    <div class="card-body">
        <h2 class="title-2">Grupos</h2>
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
        <div class="respon table-responsive">
            <table id="pro" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th class="inico text-center">ID</th>
                        <th class="inico text-center">GRUPO</th>
                        <th class="text-center">ID MATRICULAS</th>
                        <th class="text-center">ID ASIGNATURA</th>
                        <th class="text-center">PROFESOR NOMBRES</th>
                        <th class="text-center">APELLIDO PATERNO</th>
                        <th class="text-center">APELLIDO MATERNO</th>
                        <th class="fin text-center">ID CARRERA</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($grupos as $run)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$run->nombre_grupo}}</td>
                        <td>{{$run->matricula}}</td>
                        <td>{{$run->nombre_asignatura}}</td>
                        <td>{{$run->nombres}}</td>
                        <td>{{$run->apellido_paterno}}</td>
                        <td>{{$run->apellido_materno}}</td>
                        <td>{{$run->nombre_carrera}}</td>
                        <td>

                            <div class="d-inline-block me-2">
                                <a href="{{ url('grupos',[$run]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>

                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('grupos',[$run] )}}">
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
</div>

<!-- Aqui es en donde termina la tabla de las carreras -->
<!-- Aqui empieza la ventana modal  -->
<!-- Modal -->
<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmGrupos" method="POST" action="{{ url('grupos') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-file-signature"></i>
                        </span>
                        <input type="text" name="nombre_grupo" class="form-control" maxlength="120" placeholder="Nombre del Grupo"  required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_matricula" id="" required style="width: 85%;">
                            <option value="">Seleccione la matricula</option>
                            @foreach($matriculas as $row)
                            <option value="{{$row->id}}">{{$row->matricula}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_asignatura" id="" required style="width: 85%;">
                            <option value="">Seleccione la asignatura</option>
                            @foreach($asignaturas as $row)
                            <option value="{{$row->id}}">{{$row->nombre_asignatura}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="id_profesor" class="form-control select2" required style="width: 85%;">
                            <option value="">Seleccione el codigo del profesor</option>
                            @foreach($maestros as $row)
                            <option value="{{$row->id}}">{{$row->codigo}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_carrera" id="" required style="width: 85%;">
                            <option value="">Seleccione la carrera</option>
                            @foreach($carreras as $row)
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 mx-auto">
                            <button class="btn btn-outline-success btn-lg">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar
                            </button>
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
        $('#pro').DataTable({
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

    // Empieza select 2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection()