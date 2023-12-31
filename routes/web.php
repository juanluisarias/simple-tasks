<?php

use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\ApiSearchController;
use App\Http\Controllers\ItemController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('actividades/create',[ActividadesController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/actividades', ActividadesController::class);
Route::get('/searchactividades', [ActividadesController::class, 'index']);


Route::resource('/tareas', TareasController::class);
Route::get('/tareas/create', [TareasController::class, 'create']);
Route::get('/tareas/show/{id}',[TareasController::class, 'show']);
Route::get('/tareas/edit/{id}',[TareasController::class, 'edit']);
Route::put('/tareas/{id}',[TareasController::class, 'update']);
Route::delete('/tareas/delete/{id}',[TareasController::class, 'destroy']);
Route::get('/search', [TareasController::class, 'index']);


Route::get('/reportes/create', [ReportesController::class, 'create']);
Route::get('/reportes/show/{id}',[ReportesController::class, 'show']);
Route::get('/reportes/edit/{id}',[ReportesController::class, 'edit']);
Route::put('/reportes/{id}',[ReportesController::class, 'update']);
Route::delete('/reportes/delete/{id}',[ReportesController::class, 'destroy']);
Route::resource('/reportes', ReportesController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PDF
Route::get('/generate-pdf', 'PDFController@generatePDF');
Route::get('descargar-tareas', [TareasController::class, 'pdf'])->name('listadotareas.pdf');
Route::get('descargar-actividades', [ActividadesController::class, 'pdf'])->name('listadoactividades.pdf');
Route::get('descargar-reportes', [ReportesController::class, 'pdf'])->name('listadoreportes.pdf');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//todo
Route::get('/todo', [ItemController::class, 'index']);
Route::post('/todo', [ItemController::class, 'store']);
Route::put('/todo/{id}', [ItemController::class, 'update']);
Route::delete('/todo/{id}', [ItemController::class, 'destroy']);