<?php
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});
Route::get('/', function()
{
	return Redirect::to('login');
});

Route::get('logout','LoginController@getLogOut');


Route::group(['before'=>'guest'],function(){
Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('registro','RegistroController@getRegistro');
Route::post('registro','RegistroController@postRegistro');
});



Route::group(['before'=>'auth'],function(){
Route::group(['before'=>'admin'],function(){
Route::get('administrador','DashboardController@getAdministrador');
Route::get('administrador/inicio',function(){
if(Request::ajax()){
	return View::make('administrador.inicio'); 
}
});
//alumnos
Route::get('administrador/alumnosindex','AlumnosController@getIndex');
Route::get('administrador/showalumnos','AlumnosController@getAlumnos');
Route::get('administrador/deletealumnos','AlumnosController@deleteAlumnos');

//MATERIAS
Route::get('administrador/materiasindex','MateriasController@getIndex');
Route::post('administrador/materiasenviar',array('before'=>'csrf','uses'=>'MateriasController@postMateria'));
Route::get('administrador/materiasshow','MateriasController@showMaterias');
Route::get('administrador/materiasdelete','MateriasController@deleteMateria');
Route::post('administrador/materiasedit',array('before'=>'csrf','uses'=>'MateriasController@editMateria'));
Route::get('administrador/activarmateria','MateriasController@activarMateria');
Route::get('administrador/showmateriasinactivs','MateriasController@showMateriasInactivas');

//MAESTROS
Route::get('administrador/maestrosindex','MaestrosController@getIndex');
Route::get('administrador/maestrosshow','MaestrosController@showMaestros');
Route::get('administrador/maestrosdelete','MaestrosController@deleteMaestro');
Route::post('administrador/maestrosenviar',array('before'=>'csrf','uses'=>'MaestrosController@postMaestro'));
Route::post('administrador/maestrosedit',array('before'=>'csrf','uses'=>'MaestrosController@editMaestro'));
Route::get('administrador/activarmaestro','MaestrosController@activarMaestro');
Route::get('administrador/showmaestrosinactivos','MaestrosController@showMaestrosInactivos');

//AULAS
Route::get('administrador/aulasindex','AulasController@getIndex');
Route::get('administrador/turnoaulas','AulasController@getTurnoAulas');
Route::post('administrador/aulascreate',array('before'=>'csrf','uses'=>'AulasController@createAula'));
Route::get('administrador/eliminaraula','AulasController@deleteAula');

//clases
Route::get('administrador/clasesindex','ClasesController@getIndex');
Route::get('administrador/showclases','ClasesController@showClases');
Route::get('administrador/createclases','ClasesController@createClases');
Route::post('administrador/createclases',array('before'=>'csrf','uses'=>'ClasesController@storeClases'));

Route::get('administrador/evaluacionindex','EvaluacionController@getIndex');



});
Route::group(['before'=>'alumno'],function(){
	//ruta para completar el perfil del alumno
Route::get('completaperfil','AlumnoperfilController@getCompletaPerfil');
Route::post('alumno/guardaperfil',array('before'=>'csrf','uses'=>'AlumnoperfilController@completaPerfil'));	
Route::get('alumno/muestraaulas','AlumnoperfilController@getAulas');
///
//rutas para traer la pagina principal del alumno y el inicio
Route::get('alumno','DashboardController@getAlumno');
Route::get('alumno/inicio',function(){
if(Request::ajax()){
	return View::make('alumno.inicio');
}else{
	return Redirect::to('alumno');
}
});
/////////////////////////////
/////rutas para la pagina mi perfil del alumno
Route::get('alumno/miperfilindex','AlumnoperfilController@getIndex');


////////////////////////////////////////////////////7
////rutas para la pagina evaluacion del alumno
Route::get('alumno/evaluacionindex','AlumnoEvaluacionController@getIndex');


});
});


Route::get('prueba',function(){

return Student::join('aulas','aulas.id','=','estudiantes.aula_id')->
join('turnos','aulas.turno_id','=','turnos.id')->
where('estudiantes.user_id',Auth::user()->id)->
select('turnos.id','turnos.turno',DB::raw('aulas.id as aulaid'),DB::raw('concat(aulas.grado, " " ,aulas.grupo) as aula'))->get();
});