@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                                
                                            <h5>Usuarios</h5>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>     {{$cant_usuarios}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="/usuarios" class="text-white">Acceder al modulo usuario</a></h6>
                                            </div>                                            
                                        </div>                                    
                                    </div>

                                                <!-- CARD DE SERVICIOS -->
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div  style="background-color:#b4b400" class="card  order-card">
                                            <div class="card-block">
                                            <h5>Servicios</h5>                                               
                                                @php
                                                 use App\Models\Servicios;
                                                $cant_servicios = Servicios::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa-solid fa-wallet"></i><span>    {{$cant_servicios}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="servicios" class="text-white">Acceder al modulo de servicios</a></h6>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    <!-- FIN CARD DE SERVICIOS -->

                                       <!-- CARD DE  PAGOS DE SERVICIOS -->
                                       <div class="col-md-4 col-xl-4">
                                    
                                    <div  style="background-color:#00b4b4" class="card  order-card">
                                            <div class="card-block">
                                            <h5>Registro de pagos</h5>                                               
                                                @php
                                                 use App\Models\Registro_pagos;
                                                $cant_registro_pagos = Registro_pagos::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa-solid fa-money-bill-transfer"></i><span>     {{$cant_registro_pagos}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="registrop" class="text-white">Acceder al modulo de Registro de pagos</a></h6>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    <!-- FIN CARD DE PAGOS SERVICIOS -->

                                         <!-- CARD DE carreras -->
                                         <div class="col-md-4 col-xl-4">
                                    
                                    <div  style="background-color:#008181" class="card  order-card">
                                            <div class="card-block">
                                            <h5>Registro de carreras</h5>                                               
                                                @php
                                                 use App\Models\Carreras;
                                                $cant_carreras = Carreras::count();                                                
                                                @endphp
                                                <h2 class="text-right"> <i class="fa-sharp fa-solid fa-layer-group"></i> <span>     {{$cant_carreras}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="carreras" class="text-white">Acceder al modulo de carreras</a></h6>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    <!-- FIN CARD DE carreras -->
                                    
                                    <div class="col-md-4 col-xl-4">
                                    <div  style="background-color:#2B1C8A" class="card  order-card">
                                            <div class="card-block">
                                            <h5>Planes de Estudio</h5>                                               
                                                @php
                                                 use App\Models\PlanEstudio;
                                                $cant_plan = PlanEstudio::count();                                                
                                                @endphp
                                                <h2 class="text-right"> <i class="fa-solid fa-graduation-cap"></i> <span>     {{$cant_plan}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="planEstudio" class="text-white">Acceder a los Planes de Estudio</a></h6>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    <!-- FIN CARD DE  -->
     
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>     {{$cant_roles}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="/roles" class="text-white">Acceder al modulo de roles</a></h6>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Blogs</h5>                                               
                                                @php
                                                 use App\Models\Blog;
                                                $cant_blogs = Blog::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>     {{$cant_blogs}}</span></h2>
                                                <h6 class="m-b-0 text-right"><a href="/blogs" class="text-white">Acceder al modulo de Blogs</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

