@extends('layouts.app')
@section('content')
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4"></div> 



 <!-- COMIENZO DE LA CARD  TABLA -->
 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col"></div> 
            <!-- COMIENZO DE LA TABLA -->
    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
        <div class="table-responsive">
        <table  id="pro" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead class="bg-success text-center">
                    <tr>

                        <th scope="col"class="text-center text-black">FOLIO</th>
                        <th scope="col" class="text-center text-black">NOMBRES</th>
                        <th scope="col" class="text-center text-black">APELLIDOS PATERNO</th>
                        <th scope="col" class="text-center text-black">APELLIDOS MATERNO</th>
                        <th scope="col" class="text-center text-black">CURP</th>
                        <th scope="col" class="text-center text-black">CORREO</th>
                        <th scope="col" class="text-center text-black">TELEFONO</th>
                        <th scope="col" class="text-center text-black">LOCALIDAD</th>
                        <th scope="col" class="text-center text-black">GENERO</th>
                        <th scope="col" class="text-center text-black">PROCEDENCIA</th>
                        <th scope="col" class="text-center text-black">CARRERA</th>
                        <th scope="col" class="text-center text-black">ACCIONES</th>
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


                        <td class="text-center">

                            <a  href="{{ url('asp', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>
                            
           
                            <form method="POST" action="{{ url('asp', [$row]) }}">
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
           

    </section>
  
@endsection

@section('page_js')
            <script>
                //  EMPIEZA DATATABLES
                $(document).ready(function() {
                    var table = $('#pro').DataTable({
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
                            'search': '<i class="fa-solid fa-magnifying-glass"></i> BUSCAR UN ASPIRANTE',
                            'paginate': {
                                'next': 'Siguiente',
                                'previous': 'Anterior',
                            }
                        }


                    });

                    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
                    $('#pro thead tr').clone(true).appendTo('#pro thead');

                    $('#pro thead tr:eq(1) th').each(function(i) {
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
    $('.aspirante').select2();
});
            </script>

       
       
            @endsection()