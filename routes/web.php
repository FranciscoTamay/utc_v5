<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Aspirantes2Controller;
use App\Http\Controllers\ProcedenciasController;
use App\Http\Controllers\PlanEstudioController;
use App\Http\Controllers\AspirantesController;
use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ShowPago;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RegistroPagosController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\GradoProfesorController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MatriculasController;
use App\Http\Livewire\Asignaturas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});
Route::get('alumno', function () {
    return view('aspirantes.aspiranteAm');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('servicios', ServiciosController::class);
    Route::resource('registrop', RegistroPagosController::class);
    Route::resource('carreras', CarrerasController::class);
    Route::resource('planEstudio',PlanEstudioController::class);
    Route::resource('asp', AspirantesController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    Route::resource('matriculas', MatriculasController::class);
    Route::resource('alumnos', AlumnosController::class);
    Route::resource('grupos', GruposController::class);
    Route::resource('maestros', MaestrosController::class);
    Route::resource('procedencias', ProcedenciasController::class);
    Route::get('pedos', Asignaturas::class);
    Route::resource('grados', GradoProfesorController::class);

// RUTAs DE HECTOR
// FIN DE LAS RUTAS DE HECTOR
});
Route::resource('aspirante', Aspirantes2Controller::class);

Route::get('calificaciones', function () {
    return view('calificaciones.calificaciones');
});




