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
                        <th class="fin text-center">CARRERA</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i=1; @endphp
                    @foreach($grupos as $run)
                    <tr>
                        <!-- hay vistas como esta en donde se ve la tabla pero en los td
                                estan unas llaves abiertas {{$run->dato}} es que en la parte de
                                arriba en el foreach lo que hacemos es que por medio de lo que haya en 
                                en la variable que tiene un signo de peso va a recorrer y llenar los datos
                                de abajo nosotros tenemos puesto un $variable as $run ese as run es la forma
                                en la que tu puedas llamar la variable por la que vas a imprimir en la tabla
                                podrias ser otra cosa o el mismo nombre simplemnte es para generar instancia -->
                            
                        <td>{{$i++}}</td>
                        <td>{{$run->nombre_carrera}}</td>
                        <!-- aqui es como vemos $variable antes definida y apuntamos a que es lo que quieres
                            que imprima, lo que este va a imprimir tiene que estar en la base de datos porque
                            si a lo que apuntamos no esta en la base de datos o esta vacio no se mostrara nada en la tabla -->
                        <td>

                            <div class="d-inline-block me-2">
                                <a href="{{ url('grupos',[$run]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                    <!-- esta es la variable que teniamos definidos en la funcion show para que 
                                        pueda redirigirnos a la ventana de editar -->
                                </a>
                            </div>

                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('grupos',[$run] )}}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                    <!-- aqui simplemente llama a la funcion de destroy recordando que la logica esta en el
                                        controlador y como este ve que el id es igual pues solo lo borrara de la base de datos -->
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
                        <input type="text" name="nombre_grupo" class="form-control" maxlength="120" placeholder="Nombre del Grupo" required>
                        <!-- vemos que cada uno de los input tiene un name ese es el que se manda al controlador
                    para que pueda enviarlos a la base de datos -->
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
                            <!-- en el select le tenemos puesto un foreach para que este recorra el objeto
                                una ves que lo haga mostrara todos los elementos que contenga para que el
                                usuario pueda seleccionar -->
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

    // Empieza select 2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection()