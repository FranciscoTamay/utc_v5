@extends('layouts.app')
@section('content')
<div class="section mt-4">

    <div class="card-body">
        <h2 class="title-2">Escuelas de Prosedencias</h2>
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
                <thead class="bg-darck text-center">
                    <tr>

                        <th class="inico text-center">ID</th>
                        <th class="text-center">NOMBRE DE LA ECUELA DE PROCEDENCIA</th>
                        <th class="fin text-center">FECHA DE CREACION</th>
                        <th class="accion text-center">ACCIONES</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($procedencias as $row)
                    <tr>
                        <td class="text-center">{{ $row->id }}</td>
                        <td class="text-center">{{ $row->nombre_esc }}</td>
                        <td class="text-center">{{ $row->created_at }}</td>
                        <td class="text-center">
                            <div class="d-inline-block me-2">
                                <a href="{{ url('procedencias', [$row]) }}" class="btn btn-success"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('procedencias', [$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmServicios" method="POST" action="{{url("procedencias")}}">
                    @csrf

                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-school"></i></span>
                        <input type="text" name="nombre_esc" class="form-control" maxlength="50" placeholder="NOMBRE DE LA ESCUELA DE PROCEDENCIA" required>

                    </div>
                    <!-- FIN DE DATO -->


                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
                <!-- final del formulario -->
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
</script>
@endsection()