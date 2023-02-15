@extends('layouts.app')
@section('page_css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<!-- EXPORTAR EXEL -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<!-- SELECT 2 -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css"> -->
@endsection
@section('content')
<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4"></div> 
                                    <!-- esta madre nada mas es una espacio en blanco para centrar col-md- y el perro tamaño que quieras jsjsjjs -->
                                    <div class="col-md-4 col-sm-1">
                                    <div class="accordion" id="accordionExample">
                                       
                             <!-- AGREGAR SERVICIO -->
<div class="row"></div>                  
 <div class="accordion-item ">
    <h2 class="accordion-header bg-success" id="headingTwo">
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa-solid fa-wallet"></i>
                    AGREGAR UN SERVICIO
      </button>
      
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">
    <form id="frmServicios" method="POST" action="{{url("servicios")}}">
    @csrf
    <!-- CASILLA DE DATO -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
        <input type="text" name="codigo_serv" class="form-control" maxlength="50" placeholder="CODIGO SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->

     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
        <input type="text" name="nombre_serv" class="form-control" maxlength="50" placeholder="NOMBRE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
     <!-- CASILLA DE DATO -->
     <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
        <input type="number" name="precio_serv" class="form-control" maxlength="50" placeholder="PRECIO DE SERVICIO" required>
        
    </div>
    <!-- FIN DE DATO -->
 
   
<div class="d-grid col-6 mx-auto">
    <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
</div>
    </form>

</div>

        <!-- FIN FORMULARIO PARA AGREGARR-->

      </div>
    </div>
  </div>
</div>
                                    
                               
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>

</section>
<!-- COMIENZO DE LA CARD  TABLA -->
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col"></div> 
            <!-- COMIENZO DE LA TABLA -->
    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
        <div class="table-responsive"></div>
            <table  id="example23" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead class="bg-secondary text-center">
                <tr>
                    
        <th scope="col"class="text-center text-black" >CODIGO DEL SERVICIO</th>
        <th scope="col"class="text-center text-black" >NOMBRE DEL SERVICIO</th>
        <th scope="col"class="text-center text-black" >PRECIO DEL SERVICIO "MX"</th>
        <th scope="col"class="text-center text-black" >EDIATAR</th>
        <th scope="col"class="text-center text-black" >BORRAR</th>
    </tr>
                </thead>
                <tbody class="table-group-divider" >
                    @foreach($servicios as $row)
                    <tr>
                        
                        <td  scope="col"class="text-center text-black fw-bold">{{ $row->codigo_serv }}</td>
                        <td class="text-center  fw-bold text-black  ">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black text-success ">{{ $row->precio_serv }}</td>
                
                        <td class="text-center">

        <a href="{{ url('servicios', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>
</td>
<td class="text-center  fw-bold fs-6" style="width:1%">
           <form method="POST" action="{{ url('servicios', [$row]) }}">
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

<!-- FINDE LA TABLA -->
        </div>
    </section>

    <!-- FIN DE SECCION -->

@endsection

@section('page_js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
 <!-- SELECT 2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>  

<!-- Para los estilos en Excel -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
            <script> 
             //  EMPIEZA DATATABLES
             $(document).ready(function(){
                            var table = $('#example23').DataTable({
                               orderCellsTop: true,
                               fixedHeader: true,
                                     dom: "Bfrtip",
                            buttons:{
                                dom: {
                                    button: {
                                        className: 'btn'
                                    }
                                },
                                buttons: [
                                {
                                    //definimos estilos del boton de excel
                                    extend: "excel",
                                    text:' <i class="fa-solid fa-file-invoice"></i> EXPORTAR LISTA DE LIBROS A EXCEL',
                                    className:'btn btn-outline-success',
                    
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
                        }
                    ]            
                } , 
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
                            $('#example23 thead tr').clone(true).appendTo( '#example23 thead' );
                        
                            $('#example23 thead tr:eq(1) th').each( function (i) {
                                var title = $(this).text(); //es el nombre de la columna
                                $(this).html( '<input class="text-center" type="text" placeholder="FILTRAR REGISTRO" />' );
                         
                                $( 'input', this ).on( 'keyup change', function () {
                                    if ( table.column(i).search() !== this.value ) {
                                        table
                                            .column(i)
                                            .search( this.value )
                                            .draw();
                                    }
                                } );
                            } );   
                        });

                         //  TERMINA DATATABLES
</script>
            @endsection()
