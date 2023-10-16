<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('/login', [App\Http\Controllers\CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\CustomLoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\CustomLoginController::class, 'logout'])->name('logout');


//USUARIOS RUTAS
Route::get('/adminSession', function () {
    return view('adminSession');
})->middleware('auth')->name('admin');

Route::get('/normalSession', function () {
    return view('normalSession');
})->middleware('auth');

//RUTAS DE LOS ADMINISTRADORES
Route::get('/profesores', [App\Http\Controllers\UserController::class, 'mostrarDatos'])->name('registrarProfesores')->middleware('auth');
Route::post('/registerPropio', [App\Http\Controllers\CustomRegisterController2::class, 'register'])->name('registerPropio');


Route::get('/cursos', [App\Http\Controllers\CursosController::class, 'index'])->name('registrarCursos')->middleware('auth');

Route::post('/cursos', [App\Http\Controllers\CursosController::class, 'store'])->name('cursos.store')->middleware('auth');

Route::get('/semestres', [App\Http\Controllers\SemestreController::class, 'index'])->name('registrarSemestres')->middleware('auth');

Route::post('/semestres', [App\Http\Controllers\SemestreController::class, 'store'])->name('semestres.store')->middleware('auth');

Route::get('/cargaHoraria/{semestreId}', [App\Http\Controllers\CargaHorariaController::class, 'index'])->name('carga')->middleware('auth');
Route::post('/cargaHoraria/{semestreId}', [App\Http\Controllers\SemestreCursoDocenteController::class, 'store'])->name('semestres_curso_docente.store')->middleware('auth');


//rutas de docentes

Route::get('/normalSesion', [App\Http\Controllers\NormalSesionController::class, 'index'])->name('normalSesion')->middleware('auth');
Route::get('/semestreDocente/{semestreId}', [App\Http\Controllers\SemestreDocenteController::class, 'index'])->name('semestreDocente')->middleware('auth');
