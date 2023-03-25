@extends('layouts.app')
@section('content')
<section class="section mt-4">
    <div class="card-body">
        <h2 class="title-2">Aspirantes</h2>
        <div class="respon table-responsive">
            <table id="pro" class="xd display responsive nowrap" style="width:95%">
                <thead class="bg-respon text-center">
                    <tr>
                        <th scope="col" class="text-center text-black">FOLIO</th>
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
                            <div class="d-inline-block me-2">
                                <a href="{{ url('asp', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="d-inline-block">
                                <form method="POST" action="{{ url('asp', [$row]) }}">
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pro').DataTable();
    });

    //  TERMINA DATATABLES

    // Empieza select 2
    $(document).ready(function() {
        $('.aspirante').select2();
    });
</script>



@endsection()