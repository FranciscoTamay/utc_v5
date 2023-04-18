@extends('layouts.app')
@section('content')
<section class="section mt-4">
    <div class="card-body">
        <h2 class="title-2">Aspirantes</h2>
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
            <a href="form" >
                <button class="btn btn-dark col-md-4 offset-md-4">
                    
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
                </a>
            </div>
        </div>
        <div class="respon">
            
            <table id="example" class="xd display responsive nowrap rounded-table" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th class="inico text-center">FOLIO</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">APELLIDOS PATERNO</th>
                        <th class="text-center">APELLIDOS MATERNO</th>
                        <th class="text-center">CURP</th>
                        <th class="text-center">CORREO</th>
                        <th class="text-center">TELEFONO</th>
                        <th class="text-center">LOCALIDAD</th>
                        <th class="text-center">GENERO</th>
                        <th class="text-center">PROCEDENCIA</th>
                        <th class="fin text-center">CARRERA</th>
                        <th class="accion text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($aspirantes as $row)
                    <tr>
                        <td class="text-center  fw-bold text-black">{{ $row->folio }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombres }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->apellido_p }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->apellido_m }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->curp }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->correo }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->telefono }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->localidad }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->genero }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_esc }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_carrera }}</td>
                        <td class="text-center ">
                            <div class="d-inline-block me-2">
                                <a href="{{ url('asp', [$row]) }}" class="btn btn-success"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="d-inline-block me-2">
                                <form method="POST" action="{{ url('asp', [$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                            <div class="d-inline-block">
                                <a href="http://127.0.0.1:8000/nota/{{$row->id}}" class="btn btn-info"><i class="fa-solid fa-file"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection

@section('scripts')
<script>

    $(document).ready(function() {
        $('#example').DataTable({
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
        $('.aspirante').select2();
    });
</script>
@endsection()