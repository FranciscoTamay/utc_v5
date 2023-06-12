@extends('layouts.app')
@section('content')


<!-- COMIENZO DE LA CARD  TABLA -->
<section class="section mt-4">
    <div class="card-body">
        <h2 class="title-2">Servicios</h2>
        @livewire('show-servicios')
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
                     <!-- hay vistas como esta en donde se ve la tabla pero en los td
                                estan unas llaves abiertas {{$row->dato}} es que en la parte de
                                arriba en el foreach lo que hacemos es que por medio de lo que haya en 
                                en la variable que tiene un signo de peso va a recorrer y llenar los datos
                                de abajo nosotros tenemos puesto un $variable as $run ese as run es la forma
                                en la que tu puedas llamar la variable por la que vas a imprimir en la tabla
                                podrias ser otra cosa o el mismo nombre simplemnte es para generar instancia -->
                    <tr>

                        <td scope="col" class="text-center text-black fw-bold">{{ $row->codigo_serv }}</td>
                        <td class="text-center  fw-bold text-black  ">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black text-success ">{{ $row->precio_serv }}</td>
                        <td class="text-center">
<!-- aqui es como vemos $variable antes definida y apuntamos a que es lo que quieres
                            que imprima, lo que este va a imprimir tiene que estar en la base de datos porque
                            si a lo que apuntamos no esta en la base de datos o esta vacio no se mostrara nada en la tabla -->
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