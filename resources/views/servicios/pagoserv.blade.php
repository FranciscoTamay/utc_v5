@extends('layouts.app')

@section('content')
<section class="section mt-3">
    <div class="card-body">
        <h2 class="title-2">REGISTRO DE PAGOS</h2>
        <div class="row mt-3 mb-4">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">        
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

                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                      <i class="fa-solid fa-circle-plus"></i>PAGO NUEVO</button>
                </div>
            </div>
        </div>

        <div class="respon">
            <table id="pagos" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>
                        <th scope="col" class="text-center text-black">FOLIO</th>
                        <th scope="col" class="text-center text-black">SERVICIO</th>
                        <th scope="col" class="text-center text-black">MATRICULA</th>
                        <th scope="col" class="text-center text-black">FECHA DE PAGO SERVICIO</th>
                        <th scope="col" class="text-center text-black">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($registro_pagos as $row)
                    <tr>
                        <td class="text-center  fw-bold text-black">{{ $row->estado }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->id_matricula}}</td>
                        <td class="text-center  fw-bold text-black">{{ $row->created_at }}</td>
                        <td class="text-center">

                            <div class="d-inline-block me-2">
                                <a href="{{ url('registrop', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('registrop', [$row]) }}">
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


<div class="modal fade" id="modalCarreras" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="my-form" method="POST" action="{{url("registrop")}}">
                    @csrf
                      <!-- CASILLA DE DATO -->
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                        <input type="number" name="estado" class="form-control" maxlength="50" placeholder="FOLIO" required>
                    </div>
                    <!-- FIN DE DATO -->
                    <!-- CASILLA DE DATO -->
                    <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                        <span class="input-group-text"><i class="fa-solid fa-wallet"></i></span>
                        <select name="id_servicio" class="select2 form-control " required style="width: 89%;">
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
                  
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
                <!-- final del formulario -->
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script>
   $(document).ready(function() {
  $('#pagos').DataTable({
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
                       text:'EXPORTAR LISTA DE PAGOS A EXCEL',
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
               'search': "BUSCAR UN REGISTRO DE PRESTAMO",
               'paginate': {
                   'next': 'Siguiente',
                   'previous': 'Anterior',
      }
    },
    columnDefs: [{
      targets: '_all',
      searchable: true
    }],
    initComplete: function() {
      this.api().columns().every(function() {
        var column = this;
        var header = $(column.header());
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

    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
   // Empieza select 2 TERMINA

   
</script>

@endsection()