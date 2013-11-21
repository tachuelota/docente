<?php
class AlumnoEvaluacionController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			return View::make('alumno.evaluacion.index');
		}else{
			return Redirect::to('alumno');
		}
	}
}