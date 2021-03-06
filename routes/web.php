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

Route::get('error', function(){ 
    abort(500);
});

////////////////Administración////////////////////
//Usuarios
Route::resource('users', 'UserController');

Route::resource('students', 'StudentController');
Route::resource('ofertas', 'OfertaController');
Route::resource('horarios', 'HorarioController');
Route::resource('periodos', 'PeriodoController');
Route::resource('materias', 'MateriaController');
Route::resource('inscriptions', 'InscriptionController');
Route::resource('notas', 'NotaController');
Route::resource('aulas', 'AulaController');

Route::post('/ajaxOfertas', 'PeriodoController@ajaxOfertas');
Route::post('/ajaxHorarios', 'PeriodoController@ajaxHorarios');
Route::post('/ajaxMaterias', 'MateriaController@ajaxMaterias');
Route::post('/ajaxInsPeriodo', 'InscriptionController@ajaxInsPeriodo');


//Reportes
Route::get('/notasIndex', 'ReportsController@notasIndex');
Route::post('/notasReport', 'ReportsController@notasReport');

Route::get('/ofertasIndex', 'ReportsController@ofertasIndex');
Route::post('/ofertasReport', 'ReportsController@ofertasReport');
Route::get('/bitacorasIndex', 'ReportsController@bitacorasIndex');
Route::post('/bitacorasReport', 'ReportsController@bitacorasReport');
Route::get('/calificacionesIndex', 'ReportsController@calificacionesIndex');
Route::post('/calificacionesReport', 'ReportsController@calificacionesReport');

//Graficos
Route::get('/inscritos', 'InscritoController@index');
Route::get('/inscritoXOferta', 'InscritoController@inscritoXOferta');





