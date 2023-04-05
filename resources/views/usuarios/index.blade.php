@extends('layouts.app')

@section('content')
<section class="section mt-4">
  <div class="card-body">
    <h2 class="title-2">Usuarios</h2>

    <div class="row mt-1 mt-4 mb-4">
      <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
          <a href="{{ route('usuarios.create') }}" class="btn btn-dark">
            <i class="fa-solid fa-circle-plus"></i> Nuevo
          </a>
        </div>
      </div>
    </div>

    <div class="respon">
      <table id="pro" class="xd display responsive nowrap" style="width:95%">
        <thead class="bg-darck text-center">
          <th  class="inico text-center text-wiela">Nombre</th>
          <th class="text-center text-black">E-mail</th>
          <th  class="fin text-center text-black">Rol</th>
          <th  class="accion text-center text-black">Acciones</th>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
          <tr>
            <td class="text-center  fw-bold text-black">{{ $usuario->name }}</td>

            <td class="text-center  fw-bold text-black">{{ $usuario->email }}</td>
            <td class="text-center  fw-bold text-black">
              @if(!empty($usuario->getRoleNames()))
              @foreach($usuario->getRoleNames() as $rolNombre)
              <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
              @endforeach
              @endif
            </td>

            <td>
              <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

              {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>

$(document).ready(function() {
        $('#pro').DataTable({
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

  $(document).ready(function() {
    $('#pro').DataTable();
  });
</script>
@endsection()