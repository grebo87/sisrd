<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('sisrd.sisrd');
});

/*
|--------------------------------------------------------------------------
| Module the Login Routes
|--------------------------------------------------------------------------
|
*/
Route::any('seguridad/login','AuthController@showLogin');
Route::post('seguridad/revisar','AuthController@postLogin');
Route::any('seguridad/salir','AuthController@logOut');
Route::controller('seguridad','AuthController');

/*
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Module the Docentes Routes
|--------------------------------------------------------------------------
|
*/
Route::any('docente/form_editar_postgrado', 'DocentesController@form_editar_postgrado');
Route::any('docente/form_editar_pregrado', 'DocentesController@form_editar_pregrado');

Route::any('docente/create', 'DocentesController@create');
Route::post('docente/store', 'DocentesController@store');
Route::get('docente/show', 'DocentesController@show');
//crea arreglo con los datos(formato json)
Route::any('docente/listadocentes','DocentesController@getListas');
Route::get('docente/edit/{id?}','DocentesController@edit');
Route::post('docente/updatedocente', 'DocentesController@update');
Route::any('docente/updatepregrado', 'DocentesController@actualizarpregrado');
Route::post('docente/agregarpregrado', 'DocentesController@agregarpregrado');
Route::post('docente/agragarpostgrado', 'DocentesController@agragarpostgrado');
Route::post('docente/updatepostgrado', 'DocentesController@actualizarpostgrado');
Route::controller('docente','DocentesController');

/*
|-------------------------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Module the Saber Routes
|--------------------------------------------------------------------------
|
*/

Route::get('saber/create', 'SaberesController@create');
Route::post('saber/store', 'SaberesController@store');
Route::get('saber/show', 'SaberesController@show');
Route::any('saber/listsaber','SaberesController@listsaber');
Route::get('saber/edit/{codigo?}','SaberesController@edit');
Route::post('saber/update', 'SaberesController@update');
Route::controller('saber','SaberesController');

/*
|---------------------------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Module the Relacion Docente Routes
|--------------------------------------------------------------------------
|
*/

Route::get('relacion/create', 'RelacionDocentesController@create');
Route::post('relacion/store', 'RelacionDocentesController@store');
Route::get('relacion/registrar', 'RelacionDocentesController@registrarrelacionshow');
Route::post('relacion/registro_relacion', 'RelacionDocentesController@registro_relacion');
Route::any('relacion/datosrelaciondocentedocente','RelacionDocentesController@datosrelaciondocentedocente');

Route::post('relacion/listas','RelacionDocentesController@listas');
Route::post('relacion/horasemanal','RelacionDocentesController@horasemanal');
Route::post('relacion/guardarrelacion','RelacionDocentesController@guardarrelacion');
Route::post('relacion/update', 'RelacionDocentesController@update');
Route::get('relacion/show', 'RelacionDocentesController@listarelacionshow');
Route::post('relacion/listarelacionget', 'RelacionDocentesController@listarelacionget');
Route::get('relacion/edit{id?}', 'RelacionDocentesController@editarrelacion');
Route::post('relacion/actualizarrelacion', 'RelacionDocentesController@actualizarrelacion');
Route::post('relacion/guardarsaber', 'RelacionDocentesController@guardarsaber');
Route::get('relacion/eliminarsaberdocente/{id?}/{cedula?}', 'RelacionDocentesController@eliminarsaberdocente');
Route::get('relacion/mensaje/{id?}', 'RelacionDocentesController@mensaje');
Route::get('relacion/verrelacion','RelacionDocentesController@verrelacion');
Route::get('relacion/aprobar/{id?}','RelacionDocentesController@aprobar');


Route::controller('relacion','RelacionDocentesController');

/*
|---------------------------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Module the Configuracion Routes
|--------------------------------------------------------------------------
|
*/
Route::get('config', 'ConfiguracionController@index');
Route::get('departamento','DepartamentosController@index');
Route::get('editardepartamento{id?}', 'DepartamentosController@edit');
Route::any('creardepartamento', 'DepartamentosController@create');
Route::post('guardardepartamento', 'DepartamentosController@store');
Route::post('actualizardepartamento', 'DepartamentosController@update');

/*
|--------------------------------------------------------------------------
| Module the Sedes Routes
|--------------------------------------------------------------------------
|
*/

Route::get('sedes', 'SedesController@index');
Route::get('crearsede','SedesController@create');
Route::post('guardarsede', 'SedesController@store');
Route::get('editarsede{id?}', 'SedesController@edit');
Route::post('actualizarsede', 'SedesController@update');


/*
|--------------------------------------------------------------------------
| Module the User Routes
|--------------------------------------------------------------------------
|
*/

Route::get('user/create', 'UsuariosController@create');
Route::any('user/administrativo', 'UsuariosController@createAministrativo');
Route::any('user/docente', 'UsuariosController@createDocente');
Route::post('user/storeadmin', 'UsuariosController@storeAdministrativo');
Route::post('user/storedocente', 'UsuariosController@storeDocente');
Route::post('user/datosdocente', 'UsuariosController@datosdocente');
Route::any('user/show', 'UsuariosController@show');
Route::controller('user','UsuariosController');

