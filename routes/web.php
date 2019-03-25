<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////Administración////////////////////
//Usuarios
Route::resource('users', 'UserController');

Route::resource('students', 'StudentController');
Route::resource('ofertas', 'OfertaController');
Route::resource('horarios', 'HorarioController');
Route::resource('periodos', 'PeriodoController');
Route::resource('materias', 'MateriaController');

Route::post('/ajaxOfertas', 'PeriodoController@ajaxOfertas');
Route::post('/ajaxHorarios', 'PeriodoController@ajaxHorarios');
Route::post('/ajaxMaterias', 'MateriaController@ajaxMaterias');





