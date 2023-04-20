@extends('layouts.app')
<style>
    .select2-container {
        z-index: 1060 !important;
    }
</style>
@section('content')
<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                EDITAR GRUPOS
            </div>

            <div class="card-body">
                <form id="frmGrupo" method="POST" action="{{ url('grupos',[$grupo] )}}">
                    @method('PUT')
                    @csrf
                    <!-- aqui al igual que en la vista en donde agregamos los datos esta es la de editar
                        en donde al principio tiene el method PUT el cual se va a encargar de que los datos 
                        que el usuario se actualicen en la base de datos  -->

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select class="form-control select2" name="id_carrera" id="" value="{{ $grupo->nombre_carrera}}" srequired style="width:93%">
                            @foreach($carreras as $row)
                            @if ($row->id == $grupo->id_carrera)
                            <option selected value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @else
                            <option value="{{$row->id}}">{{$row->nombre_carrera}}</option>
                            @endif
                            @endforeach
                            <!-- aqui lo que vemos en el seelct es que tiene un if el cual lo que va a hacer
                                es que si el id del objeto que esta recorriendo en el foreach a la llave foranea 
                                es igual va a imprimir pero el nombre y no numeros cabe recalcar que pasa lo mismo
                                con los demas si es un campo como un input este solo se vera llenado con datos que son traidos 
                                de la base de datos  -->
                        </select>
                    </div>

                    <div class="row">
                        <div class="d-gid col-3 mx-auto">
                            <button class="btn btn-outline-success ">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar
                            </button>
                            <!-- boton de guardar -->
                        </div>

                        <div class="d-grid col-3 mx-auto">
                            <button class="btn btn-outline-info ">
                                <a href="/grupos"></a>
                                <i class="fa-solid fa-arrow-left"></i> Regresar
                            </button>
                            <!-- boton de guardar -->

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@section('page_js')
@endsection()