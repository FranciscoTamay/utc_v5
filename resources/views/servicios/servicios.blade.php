@extends('layouts.app')
@section('content')
@livewire('show-servicios')
<!-- COMIENZO DE LA CARD  TABLA -->
<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table id="example23" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                            <thead class="bg-secondary text-center">
                                <tr>

                                    <th scope="col" class="text-center text-black">CODIGO DEL SERVICIO</th>
                                    <th scope="col" class="text-center text-black">NOMBRE DEL SERVICIO</th>
                                    <th scope="col" class="text-center text-black">PRECIO DEL SERVICIO "MX"</th>
                                    <th scope="col" class="text-center text-black">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($servicios as $row)
                                <tr>

                                    <td scope="col" class="text-center text-black fw-bold">{{ $row->codigo_serv }}</td>
                                    <td class="text-center  fw-bold text-black  ">{{ $row->nombre_serv }}</td>
                                    <td class="text-center  fw-bold text-black text-success ">{{ $row->precio_serv }}</td>

                                    <td class="text-center">

                                        <a href="{{ url('servicios', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>


                                        <form method="POST" action="{{ url('servicios', [$row]) }}">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                                        </form>
                                    </td>
                                    </td>
                                </tr>

                                @endforeach()
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- FIN DE SECCION -->

@endsection

@section('scripts')
<script>
    //  EMPIEZA DATATABLES
    $(document).ready(function() {
        var table = $('#example23').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: "Bfrtip",
            buttons: {
                dom: {
                    button: {
                        className: 'btn'
                    }
                },
                buttons: [{
                    //definimos estilos del boton de excel
                    extend: "excel",
                    text: ' <i class="fa-solid fa-file-invoice"></i> EXPORTAR LISTA DE LIBROS A EXCEL',
                    className: 'btn btn-outline-success',

                    // 1 - ejemplo básico - uso de templates pre-definidos
                    //definimos los parametros al exportar a excel

                    excelStyles: {
                        //template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                        //template:"green_medium" 

                        "template": [
                            "blue_medium",
                            "header_green",
                            "title_medium"
                        ]

                    },
                }]
            },
            "destroy": true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registro por Pagina",
                "zeroRecords": " No se encontro el Registro Disculpe",
                "info": "Mostrando la Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                'search': '<i class="fa-solid fa-magnifying-glass"></i> BUSCAR UN LIBRO',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior',
                }
            }


        });

        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('#example23 thead tr').clone(true).appendTo('#example23 thead');

        $('#example23 thead tr:eq(1) th').each(function(i) {
            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input class="text-center" type="text" placeholder="FILTRAR REGISTRO" />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

    //  TERMINA DATATABLES
</script>
@endsection()