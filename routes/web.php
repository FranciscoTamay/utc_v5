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
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RegistroPagosController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\GradoProfesorController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MatriculasController;
use App\Http\Livewire\Asignaturas;

use App\Http\Controllers\CalificacionesFpdfController;
use App\Http\Controllers\CedulaInscripcionController;

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
    Route::resource('calificaciones', CalificacionController::class);
    Route::post('/matriculas/obtener-alumnos', [CalificacionController::class,'obtenerAlumnosPorGrupo'])->name('alumnos.obtener-alumnos');

    
// RUTAs DE HECTOR
// FIN DE LAS RUTAS DE HECTOR
});
Route::resource('form', Aspirantes2Controller::class);
Route::get('/aspirante/agregado', function () {
    return view('nota/{folio}');
})->name('aspirante.agregado');


Route::get('fpdfCalificaciones', [CalificacionesFpdfController::class, 'calificacion']);
Route::get('fpdfCedula', [CedulaInscripcionController::class, 'hojares']);
// Route::get('calificaciones', function () {
//     return view('calificaciones.calificaciones');
// });
//  
Route::get('nota/{folio}',[Aspirantes2Controller::class,'nota'])->name('nota');

// Route::get('ticket/{folio}', ['as'=>'ticket', 'uses'=>'ventaController@ticket']);








