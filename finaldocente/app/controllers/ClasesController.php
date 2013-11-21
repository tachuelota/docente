<?php
class ClasesController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			return View::make('administrador.clases.index');
		}else{
			return Redirect::to('administrador');
		}
	}
	public function showClases(){
		if(Request::ajax()){
		$materias = Subject::whereExists(function($query){
		$query->select(DB::raw(1))
		->from('clases')
		->whereRaw('clases.materia_id = materias.id and clases.aula_id = ?',array(Input::get('idaula')));
		})->get();
return  View::make('administrador.clases.show',array('materias'=>$materias,'aula'=>Input::get('idaula')));
	}else{
	return Redirect::to('administrador');
}
}

	public function createClases(){
		if(Request::ajax()){
			$id = Input::get('id-aula');
			$maestros = Teacher::lists('nombre','id');
			$materias = Subject::lists('materia','id');
			return View::make('administrador.clases.create',array('maestros'=>$maestros,'materias'=>$materias,'aulaid'=>$id));
		}else{
			return Redirect::to('administrador');
		}
	}

	public function storeClases(){
		if(Request::ajax()){
			$idaula = Input::get('idaula');
			$idmaestro = Input::get('maestro');
			$idmateria = Input::get('materia');

			$clase = new Lesson;
			$clase->aula_id = $idaula;
			$clase->materia_id = $idmateria;
			$clase->maestro_id = $idmaestro;
			if($clase->save()){
				return Response::json(array(
					'success'=>true,
					'message'=>'Clase Creada Correctamente'
					));
			}else{
				return Resonse::json(array(
					'success'=>false,
					'message'=>$clase->errors()->toArray()

					));
			}

		}else{
			return Redirect::to('administrador');
		}
	}
}