@extends('layouts.app')
@section('content')
    <!-- COMIENZO DE LA CARD  TABLA -->
    <div class="section">
    <div class="p-10"></div>
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                      
            </div>
        </div>
    </div>
<section class="section">
    <div class="card-body">
        <h2 class="title-2">ASIGNATURAS DE LA UTC</h2>
        <br>
                <button wire:click="crear()" class="btn btn-success ">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
                @if($modal)
                @include('livewire.nuevasig')
               @endif  
                   
        <div class="respon table-responsive">
            <table id="example230" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-respon text-center">

                                    <th scope="col" class="text-center text-black">Codigo Asignatura</th>
                                    <th scope="col" class="text-center text-black">Nombre Asignatura</th>
                                    <th scope="col" class="text-center text-black">Numero de Unidades</th>
                                    <th scope="col" class="text-center text-black">HORAS ASIGNATURA</th>
                                    <th scope="col" class="text-center text-black">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                               @foreach ($asig as $row)
                                <tr>

                                    <td class="text-center  fw-bold text-black">{{$row->codigo_asignatura}}</td>
                                    <td class="text-center  fw-bold text-black">{{$row->nombre_asignatura}}</td>
                                    <td class="text-center  fw-bold text-black">{{$row->num_unidades}}</td>
                                    <td class="text-center  fw-bold text-black">{{$row->horas}}</td>


                                    <td class="text-center">

                                        <a href="" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>

                                        <form method="POST" action="">
                                          
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>

                               @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('scripts')
<script>
    //  EMPIEZA DATATABLES
    $(document).ready(function() {
        var table = $('#example230').DataTable({
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
        $('#example230 thead tr').clone(true).appendTo('#example230 thead');

        $('#example230 thead tr:eq(1) th').each(function(i) {
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
@endsection

