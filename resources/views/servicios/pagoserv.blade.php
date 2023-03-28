@extends('layouts.app')

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
                                             <!-- ALERTA DE AGREGADO CON EXITO -->
@if(Session::has('success'))

<div class="alert alert-success text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('success')}}
</div>

@endif
<!-- FIN DE ALERTA DE AGREGADO CON EXITO -->

  <!-- ALERTA DE EDITAR CON EXITO -->
@if(Session::has('warning'))

<div class="alert alert-warning text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('warning')}}
</div>
@endif
 <!-- FIN ALERTA DE EDITAR CON EXITO -->

   <!-- ALERTA DE BORRAR CON EXITO -->
@if(Session::has('danger'))

<div class="alert alert-danger text-center"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 {{Session::get('danger')}}
</div>
@endif
 <!-- FIN ALERTA DE BORRAR CON EXITO -->


                             <!-- AGREGAR SERVICIO -->
<div class="row"></div>                  
 <div class="accordion-item ">
    <h2 class="accordion-header bg-success" id="headingTwo">

      <button class="accordion-button text-center " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"><i class="fa-solid fa-wallet"></i>
                    AGREGAR UN SERVICIO
      </button>
      
    </h2>

    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body ">
       <!-- FORMULARIO PARA AGREGAR -->
       <div class="modal-body">
                <form id="frmServicios" method="POST" action="{{url("registrop")}}">
                    @csrf
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                        <span class="input-group-text"><i class="fa-solid fa-wallet"></i></span>
                        <select wire:model="id_servicio" name="id_servicio" class="select2 form-control " required style="width: 90%;">
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
                        <input type="text" wire:model="id_matricula" name="id_matricula" class="form-control @error('id_matricula') is-invalid @enderror" maxlength="50" placeholder="SELECIONA LA MATRICULA" required>
                        @error('id_matricula')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                        <input type="date"  wire:model="estado" name="estado" class="form-control @error('estado') is-invalid @enderror" maxlength="50" placeholder="ESTATO DEL PAGO" required>
                        @error('estado')
             <span class="invalid-feedback">
            <strong>{{$message}}</strong>
         </span>
           @enderror
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
<section class="section">
    <!-- COMIENZO DE LA CARD  TABLA -->
    <div class="card-body">
        <h2 class="title-2">REGISTRO DE PAGOS</h2>
        <div class="respon table-responsive">
            <table id="example230" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-respon text-center">

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