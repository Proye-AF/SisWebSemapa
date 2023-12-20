<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CombustibleController;
use App\Http\Controllers\ReporteCombustibleController;
use App\Http\Controllers\RegistrarActividadController;
use App\Http\Controllers\RegistrarCombustibleController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\RegistroUsuarioController;
use App\Models\User;
use App\Http\Controllers\AdminUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   
    Route::get('/registro_usuario', [RegistroUsuarioController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registro_usuario', [RegistroUsuarioController::class, 'register'])->name('register.user.post');


    
    //Registrar los vehiculos
    Route::get('/registro_vehiculos', 'App\Http\Controllers\VehiculoController@mostrarFormularioRegistro')->name('registro_vehiculos');
    Route::post('/registro_vehiculos', 'App\Http\Controllers\VehiculoController@store')->name('store_vehiculo');
    Route::get('/mostrar_formulario_registro', 'App\Http\Controllers\VehiculoController@mostrarFormularioRegistro')->name('registro_vehiculo');

    
    
    //Registrar conductores
    Route::get('/registro_conductores', 'App\Http\Controllers\ConductorController@index')->name('registro_conductores');
    Route::post('/registro_conductores', 'App\Http\Controllers\ConductorController@store');
    
    //Reporte vehiculos
    Route::get('/reporte-vehiculos', 'App\Http\Controllers\ReporteVehiculosController@index')->name('reporte_vehiculos');
    
    //Reporte conductores
    Route::get('/reporte-conductores', [ConductorController::class, 'reporteConductores'])->name('reporte_conductores');
    
    
    //Inicio carga combustible, pide el numero de placa
    Route::get('/entrada_placa', [CombustibleController::class, 'mostrarEntradaPlaca'])->name('mostrar_entrada_placa');
    Route::post('/buscar_vehiculo', [CombustibleController::class, 'buscarVehiculo'])->name('buscar_vehiculo');
    Route::get('/formulario_carga_combustible', [CombustibleController::class, 'mostrarFormularioCargaCombustible'])->name('mostrar_formulario_carga_combustible');
    Route::post('/registrar_carga_combustible', [CombustibleController::class, 'registrarCargaCombustible'])->name('registrar_carga_combustible');

    //Reportes combustible
    Route::get('/listar_combustible', [ReporteCombustibleController::class, 'listarCombustible'])->name('listar_combustible');
    Route::get('/ver_reporte_combustible/{id}', [ReporteCombustibleController::class, 'verReporte'])->name('ver_reporte_combustible');
    Route::get('/imprimir_reporte_combustible/{id}', [ReporteCombustibleController::class, 'imprimirReporte'])->name('imprimir_reporte_combustible');
    Route::get('/imprimir-matricial/{id}', [ReporteCombustibleController::class,'imprimirMatricial'])->name('imprimir_matricial_reporte_combustible');
    Route::get('/editar-reporte-combustible/{id}', [ReporteCombustibleController::class, 'editar'])->name('editar_reporte_combustible');
    Route::put('/guardar-edicion-reporte-combustible/{id}', [ReporteCombustibleController::class, 'guardarInformacionAdicional'])->name('guardar_edicion_reporte_combustible');
    Route::any('/anular-reporte-combustible/{id}', [ReporteCombustibleController::class, 'anular'])->name('anular_reporte_combustible');
    Route::post('/obtener_nombre_chofer', [CombustibleController::class, 'obtenerNombreChofer'])->name('obtener_nombre_chofer');


    //Registrar combustible
    
    // Mostrar el formulario para registrar combustible
    Route::get('/registro-combustible', [RegistrarCombustibleController::class, 'mostrarFormulario'])->name('mostrar_formulario_combustible');
    Route::get('/imprimir-reporte-combustible/{id}', [ReporteCombustibleController::class, 'imprimirReporte'])->name('imprimir_reporte_combustible');
    
    // Almacenar un nuevo combustible en la base de datos
    Route::post('/registro-combustible', [RegistrarCombustibleController::class, 'guardarCombustible'])->name('registro_combustible');
    Route::get('/reportes-combustible', [RegistrarCombustibleController::class, 'verReportesCombustible'])->name('ver_reportes_combustible');
    
    
    //Registrar Actividad
    // Mostrar el formulario para registrar una actividad
    Route::get('/registro-actividad', [RegistrarActividadController::class, 'mostrarFormulario'])->name('registro_actividad');
    Route::get('/ver-actividades', [RegistrarActividadController::class, 'verActividades'])->name('ver_actividades');

    // Almacenar una nueva actividad en la base de datos
    Route::post('/registro-actividad', [RegistrarActividadController::class, 'guardarActividad'])->name('guardar_actividad');
    
    // Registrar marcas de vehiculos
    Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');

    //Registrar tipos de vehiculo
    Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');
    Route::get('/tipos/create', [TipoController::class, 'create'])->name('tipos.create');
    Route::post('/tipos', [TipoController::class, 'store'])->name('tipos.store');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Registrar usuarios y roles
        Route::get('/registrar-usuario', [HomeController::class, 'mostrarRegistroUsuario'])->name('mostrar_registro_usuario');
        Route::post('/registrar-usuario', [HomeController::class, 'registrarUsuario'])->name('registrar_usuario');
    });
    
    // Rutas para el usuario
    Route::middleware(['auth', 'role:user'])->group(function () {
        // Rutas relacionadas con la carga y reporte de combustible
        Route::get('/carga-combustible', [HomeController::class, 'cargaCombustible'])->name('carga_combustible');
        Route::get('/reporte-combustible', [HomeController::class, 'reporteCombustible'])->name('reporte_combustible');
        // Otras rutas para el usuario...
    });
    
    // Rutas para el consultor
     Route::middleware(['auth', 'role:consultor'])->group(function () {
        // Rutas relacionadas con la carta y reporte de combustible
        Route::get('/carta-combustible', [HomeController::class, 'cartaCombustible'])->name('carta_combustible');
        Route::get('/reporte-combustible-consultor', [HomeController::class, 'reporteCombustibleConsultor'])->name('reporte_combustible_consultor');
        // Otras rutas para el consultor...
    });
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            // Verificar si el usuario tiene el rol 'admin'
            if (auth()->user()->hasRole('admin')) {
                return view('admin.dashboard');
            }
    
            // O puedes verificar varios roles
            if (auth()->user()->hasAnyRole(['admin', 'user'])) {
                return view('user.dashboard');
            }
    
            // Resto del código...
        });
    });

    // Ruta para filtrar reportes
    Route::match(['get', 'post'], '/filtrar-reportes', [ReporteCombustibleController::class, 'filtrarReportes'])->name('filtrar_reportes');

    // Rutas para administrador/usuario
    Route::get('/register/admin-user', [AdminUserController::class, 'showUserRegistrationForm'])->name('register.admin.user');
    Route::post('/register/admin-user', [AdminUserController::class, 'registerUser'])->name('register.admin.user.post');

    // Rutas para consultor
    Route::get('/register/consultor', [ConsultorController::class, 'showRegistrationForm'])->name('register.consultor');
    Route::post('/register/consultor', [ConsultorController::class, 'register'])->name('register.consultor.post');

});