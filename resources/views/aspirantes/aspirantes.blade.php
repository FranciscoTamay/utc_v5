@extends('layouts.app')
@section('content')

<section class="section">
        <div class="section-header">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4"></div> 
                                    <!-- esta madre nada mas es una espacio en blanco para centrar col-md- y el perro tamaño que quieras jsjsjjs -->
                                                   
              
 <!-- COMIENZO DE LA CARD  TABLA -->
 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col"></div> 
            <!-- COMIENZO DE LA TABLA -->
    <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
        <div class="table-responsive"></div>
        <table id="example230" class="table table-striped table-striped mt-4 table-bordered alert alert-with">
                <thead style="background-color:#6777ef" class=" text-center">
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
                        <th scope="col" class="text-center text-black">ESC. PROCEDENCIA</th>
                        <th scope="col" class="text-center text-black">ASP. CARRERA</th>
                        <th scope="col" class="text-center text-black">EDITAR</th>
                        <th scope="col" class="text-center text-black">BORRAR</th>
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

                            <a href="{{ url('aspirantes', [$row]) }}" class="btn bg-warning"><i class="fa-solid fa-pencil"></i></a>
                            </td>
           <td class="text-center  fw-bold fs-6" style="width:1%">
                            <form method="POST" action="{{ url('aspirantes', [$row]) }}">
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
            </div>
           

    </section>

@endsection