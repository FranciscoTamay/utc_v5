@extends('layouts.app')
<style>
    .select2-container {
        z-index: 1060 !important;
    }
</style>

@section('content')
<section class="section">

    <div class="row mt-1">
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#example">
                    Abrir ventana modal
                </button>
            </div>
        </div>
    </div>

    <!-- COMIENZO DE LA CARD  TABLA -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col"></div>
                    <!-- COMIENZO DE LA TABLA -->
                    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
                    <div class="table-responsive">
                        <table id="example230" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                            <thead class="bg-secondary text-center">
                                <tr>

                                    <th scope="col" class="text-center text-black">SERVICIO</th>
                                    <th scope="col" class="text-center text-black">MATRICULA</th>
                                    <th scope="col" class="text-center text-black">FECHA DE PAGO SERVICIO</th>
                                    <th scope="col" class="text-center text-black">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($registro_pagos as $row)
                                <tr>

                                    <td class="text-center  fw-bold text-black">{{ $row->nombre_serv }}</td>
                                    <td class="text-center  fw-bold text-black">{{ $row->id_matricula}}</td>
                                    <td class="text-center  fw-bold text-black">{{ $row->estado }}</td>


                                    <td class="text-center">

                                        <a href="{{ url('registrop', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>

                                        <form method="POST" action="{{ url('registrop', [$row]) }}">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                                        </form>
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

<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar una carrera</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="frmServicios" method="POST" action="{{url("registrop")}}">
                    @csrf
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                        <span class="input-group-text"><i class="fa-solid fa-wallet"></i></span>
                        <select name="id_servicio" class="select2 form-control " required style="width: 90%;">
                            <option class="select-wit " value="">SELECCIONA EL SERVICIO</option>
                            @foreach($servicios as $row)
                            <option value="{{$row->id}}">{{$row->nombre_serv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="id_matricula" class="form-control" maxlength="50" placeholder="SELECIONA LA MATRICULA" required>
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                        <input type="date" name="estado" class="form-control" maxlength="50" placeholder="ESTATO DEL PAGO" required>
                    </div>
                    <!-- FIN DE DATO -->
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

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
                    text: '<i class="fa-solid fa-file-invoice"></i>  EXPORTAR LISTA DE LIBROS A EXCEL',
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
                'search': '<i class="fa-solid fa-magnifying-glass"></i> BUSCAR UN SERVICIO',
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

    // Empieza select 2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

@endsection()