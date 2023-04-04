@extends('layouts.app')

@section('content')
<div class="section mt-4">
    <div class="section-body">

        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <a href="/usuarios" class="text-home">
                        <div class="home border-azul">

                            <div class="card-block">

                                <h5>Usuarios</h5>
                                @php
                                use App\Models\User;
                                $cant_usuarios = User::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-users"></i><span> {{$cant_usuarios}}</span></h2>

                            </div>

                        </div>
                    </a>
                </div>

                <!-- CARD DE SERVICIOS -->
                <div class="col-md-4 col-xl-4">
                    <a href="servicios" class="text-home">
                        <div class="home border-amarillo">
                            <div class="card-block">

                                <h5>Servicios</h5>
                                @php
                                use App\Models\Servicios;
                                $cant_servicios = Servicios::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-wallet"></i><span> {{$cant_servicios}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>
                <!-- FIN CARD DE SERVICIOS -->

                <!-- CARD DE  PAGOS DE SERVICIOS -->
                <div class="col-md-4 col-xl-4">
                    <a class="text-home" href="registrop">
                        <div class="home border-verde">
                            <div class="card-block">

                                <h5>Registro de pagos</h5>
                                @php
                                use App\Models\Registro_pagos;
                                $cant_registro_pagos = Registro_pagos::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-money-bill-transfer"></i><span> {{$cant_registro_pagos}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>
                <!-- FIN CARD DE PAGOS SERVICIOS -->

                <!-- CARD DE carreras -->
                <div class="col-md-4 col-xl-4">
                    <a href="carreras" class="text-home">
                        <div class="home border-rosado">
                            <div class="card-block">

                                <h5>Registro de carreras</h5>
                                @php
                                use App\Models\Carreras;
                                $cant_carreras = Carreras::count();
                                @endphp
                                <h2 class="text-right"> <i class="fa-solid fa-layer-group"></i> <span> {{$cant_carreras}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>
                <!-- FIN CARD DE carreras -->

                <div class="col-md-4 col-xl-4">
                    <a href="planEstudio" class="text-home">
                        <div class="home border-verde-fuerte">
                            <div class="card-block">

                                <h5>Planes de Estudio</h5>
                                @php
                                use App\Models\PlanEstudio;
                                $cant_plan = PlanEstudio::count();
                                @endphp
                                <h2 class="text-right"> <i class="fa-solid fa-graduation-cap"></i> <span> {{$cant_plan}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>
                <!-- FIN CARD DE  -->


                <div class="col-md-4 col-xl-4">
                    <a href="/roles" class="text-home">
                        <div class="home border-gris">
                            <div class="card-block">

                                <h5>Roles</h5>
                                @php
                                use Spatie\Permission\Models\Role;
                                $cant_roles = Role::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-users"></i><span> {{$cant_roles}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-xl-4">
                    <a href="procedencias" class="text-home">
                        <div class="home border-morado">
                            <div class="card-block">

                                <h5>Modulo de Escuela de Procedencias</h5>
                                @php
                                use App\Models\Procedencias;
                                $cant_procedencias = Procedencias::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-school"></i><span>{{$cant_procedencias}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-xl-4">
                    <a href="/blogs" class="text-home">
                        <div class="home border-azulf">
                            <div class="card-block">

                                <h5>Blogs</h5>
                                @php
                                use App\Models\Blog;
                                $cant_blogs = Blog::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-blog "></i><span> {{$cant_blogs}}</span></h2>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-xl-4">
                    <a href="/asp" class="text-home">
                        <div class="home border-rojo">
                            <div class="card-block">

                                <h5>Aspirantes</h5>
                                @php
                                use App\Models\Aspirantes;
                                $cant_aspirantes = Aspirantes::count();
                                @endphp
                                <h2 class="text-right"><i class="fa-solid fa-person"></i><span> {{$cant_aspirantes}}</span></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection