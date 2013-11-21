<?php
class EvaluacionController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			return View::make('administrador.evaluacion.index');
		}else{
			return Redirect::to('administrador');
		}
	}
}