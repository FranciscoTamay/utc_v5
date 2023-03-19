<div>
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
                                                <form id="frmPlanEstudio" method="POST" action="{{ url('planEstudio') }}">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-graduation-cap"></i>
                                                        </span>
                                                        <input type="text" name="nombre_plan" class="form-control" maxlength="120" placeholder="Nombre del plan" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-graduation-cap"></i>
                                                        </span>
                                                        <input type="number" name="anio" class="form-control" maxlength="50" placeholder="Año del Plan de Estudio" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-graduation-cap"></i>
                                                        </span>
                                                        <input type="number" name="cuatrimestres" class="form-control" maxlength="50" placeholder="Cuatrimestres del Plan de Estudio" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-graduation-cap"></i>
                                                        </span>
                                                        <input type="number" name="horas" class="form-control" maxlength="50" placeholder="Horas del Plan de Estudio" required>
                                                    </div>

                                                    <div class="d-grid col-6 mx-auto">
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
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
        <!-- AQUI EMPIEZA EL CONTENIDO -->

</div>