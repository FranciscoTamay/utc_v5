@extends('layouts.app')
@section('content')

<div class="section">

    <div class="row mt-1">
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-10 col-lg-10 offset-0 offset-lg-1">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center text-black">NOMBRE PLAN</th>
                            <th scope="col" class="text-center text-black">AÑO</th>
                            <th scope="col" class="text-center text-black">CUATRIMESTRES</th>
                            <th scope="col" class="text-center text-black">HORAS</th>
                            <th scope="col" class="text-center text-black">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach($planEstudios as $run)
                        <tr>

                            <td scope="col" class="text-center text-black fw-bold">{{$run->nombre_plan}}</td>
                            <td scope="col" class="text-center text-black fw-bold">{{$run->anio}}</td>
                            <td scope="col" class="text-center text-black fw-bold">{{$run->cuatrimestres}}</td>
                            <td scope="col" class="text-center text-black fw-bold">{{$run->horas}}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ url('planEstudio',[$run]) }}" class="btn btn-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <!-- boton de editar -->

                                    <div class="col-md-6">
                                        <form method="POST" action="{{ url('planEstudio',[$run] )}}">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <!-- boton de eliminar -->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un Plan de Estudios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmPlanEstudio" method="POST" action="{{ url('planEstudio') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="nombre_plan" class="form-control" maxlength="120" placeholder="Nombre del plan" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="anio" class="form-control" maxlength="50" placeholder="Año del Plan de Estudio" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="cuatrimestres" class="form-control" maxlength="50" placeholder="Cuatrimestres del Plan de Estudio" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="number" name="horas" class="form-control" maxlength="50" placeholder="Horas del Plan de Estudio" required>
                    </div>

                    <div class="d-grid col-6 mx-auto">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>
@livewireScripts
@livewireStyles
@endsection

@section('page_js')
<script>
    $(document).ready(function() {
        var table = $('#id_asignatura').DataTable({
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
</script>

@endsection()