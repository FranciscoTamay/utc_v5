@extends('layouts.app')
@section('content')
@livewire('show-servicios')
<!-- COMIENZO DE LA CARD  TABLA -->
<section class="section">
    <div class="card-body">
        <h2 class="title-2">Servicios</h2>
        <div class="respon">
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
        $('#pro4').DataTable();


        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('#pro4 thead tr').clone(true).appendTo('#pro4 thead');

        $('#pro4 thead tr:eq(1) th').each(function(i) {
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