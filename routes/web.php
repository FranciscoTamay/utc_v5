<?php
use App\Http\Controllers\ProcedenciasController;
use App\Http\Controllers\PlanEstudioController;
use App\Http\Controllers\AspirantesController;
use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RegistroPagosController;
use App\Http\Controllers\CarrerasController;

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

// RUTAs DE HECTOR

Route::resource('procedencias', ProcedenciasController::class);
// FIN DE LAS RUTAS DE HECTOR
});







