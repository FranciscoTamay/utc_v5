@extends('layouts.app')
@section('content')

<!-- COMIENZO DE LA CARD  TABLA -->
<section class="section">
    <div class="card-body">
        <h2 class="title-2">Servicios</h2>
        <div class="respon">
        @livewire('show-servicios')
            <table id="pro4" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-darck text-center">
                    <tr>

                        <th scope="col" class="text-center text-black">CODIGO DEL SERVICIO</th>
                        <th scope="col" class="text-center text-black">NOMBRE DEL SERVICIO</th>
                        <th scope="col" class="text-center text-black">PRECIO DEL SERVICIO "MX"</th>
                        <th scope="col"  text-black">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($servicios as $row)
                    <tr>

                        <td scope="col" class="text-center text-black fw-bold">{{ $row->codigo_serv }}</td>
                        <td class="text-center  fw-bold text-black  ">{{ $row->nombre_serv }}</td>
                        <td class="text-center  fw-bold text-black text-success ">{{ $row->precio_serv }}</td>
                        <td class="text-center">

                            <div class="d-inline-block me-2">
                                <a href="{{ url('servicios', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
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
                       text:'EXPORTAR LISTA DE PRESTAMOS A EXCEL',
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
    language: {
      searchPlaceholder: "Buscar",
      search: "Buscar:",
      zeroRecords: "No se encontraron resultados",
      emptyTable: "No hay datos disponibles en la tabla",
      infoEmpty: "Mostrando 0 registros de un total de 0",
      infoFiltered: "(filtrado de un total de MAX registros)",
      lengthMenu: "Mostrar MENU registros por página",
      paginate: {
        previous: "Anterior",
        next: "Siguiente"
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
</script>
@endsection()