<?php
class DashboardController extends BaseController{
	public function getAlumno(){
		$checaperfil = count(Student::where('user_id',Auth::user()->id)->get()); 
		if($checaperfil > 0){
			return View::make('alumno.index');
		}else{
			return Redirect::to('completaperfil');
			
		}
		
	}
	public function getAdministrador(){
		return View::make('administrador.index');
	}
}