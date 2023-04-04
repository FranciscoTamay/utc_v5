@extends('layouts.app')
@section('content')

<!-- COMIENZO DE LA CARD  TABLA -->
<section class="section mt-4">
    <div class="card-body">
        <h2 class="title-2">Servicios</h2>
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalServicos">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
        <div class="respon">
            <table id="pro4" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>

                        <th scope="col" class="inico text-center">CODIGO DEL SERVICIO</th>
                        <th scope="col" class="text-center">NOMBRE DEL SERVICIO</th>
                        <th scope="col" class="fin text-center">PRECIO DEL SERVICIO "MX"</th>
                        <th scope="col" class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($servicios as $row)
                    <tr>

                        <td scope="col" class="text-center text-black fw-bold">{{ $row->codigo_serv }}</td>
                        <td class="text-center  fw-bold text-black  ">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black text-success ">{{ $row->precio_serv }}</td>
                        <td class="text-center">

                            <div class="d-inline-block me-2">
                                <a href="{{ url('servicios', [$row]) }}" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                            </div>
                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('servicios', [$row]) }}">
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
</section>
<div class="modal fade" id="modalServicos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una Servico</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmServicios" method="POST" action="{{url("servicios")}}">
                    @csrf
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
                        <input type="text" wire:model="codigo_serv" name="codigo_serv" class="form-control @error('codigo_serv') is-invalid @enderror" maxlength="50" placeholder="CODIGO SERVICIO">
                        @error('codigo_serv')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- FIN DE DATO -->

                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                        <input wire:model="nombre_serv" type="text" name="nombre_serv" class="form-control @error('nombre_serv') is-invalid @enderror" maxlength="50" placeholder="NOMBRE SERVICIO" required>
                        @error('nombre_serv')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                        <input type="number" wire:model="precio_serv" name="precio_serv" class="form-control @error('precio_serv') is-invalid @enderror" maxlength="50" placeholder="PRECIO DE SERVICIO" required>
                        @error('precio_serv')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- FIN DE DATO -->


                    <div class="d-grid col-6 mx-auto">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE SECCION -->

@endsection

@section('scripts')
<script>
    //  EMPIEZA DATATABLES
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