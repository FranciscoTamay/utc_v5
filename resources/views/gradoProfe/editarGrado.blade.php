@extends('layouts.app')
@section('content')
<div class="section">

    <!-- FIN DEL CARD DEL SECTION (ES PARA QUE NO SE VEA TAN PEGADO AL HEADER ) -->
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                Editar Grado
            </div>

            <div class="card-body">
                <form id="frmgrado" method="POST" action="{{ url('grados',[$grado] )}}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <input type="text" name="grado_nombre" class="form-control" value="{{ $grado->grado_nombre}}" maxlength="50" placeholder="Código del prodesor" required>

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
                                <a href="/grados"></a>
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

@section('page_js')
@endsection()