<?php
class MateriasController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			$materias  = Subject::all();
			$materiasinactivas = Subject::onlyTrashed()->get();
			return View::make('administrador.materias.index',array('materias'=>$materias,'materiasinactivas'=>$materiasinactivas));
		}else{
			return Redirect::to('administrador');
		}
	}


	public function postMateria(){
		if(Request::ajax()){
			$materia = new Subject;
			$materia->materia = strtoupper(Input::get('materia'));

			if($materia->save()){
				return Response::json(array(
					'success'=>'true',
					'message'=>'Materia Agregada Correctamente'
					));
			}else{
				return Response::json(array(
					'success'=>'false',
					'message'=>$materia->errors()->toArray()
					));

			}
		}else{
			return Redirect::to('administrador');
		}
	}

	public function showMaterias()
	{
		if(Request::ajax()){
			$materias = Subject::all();
			return View::make('administrador.materias.show',compact('materias'));
		}else{
			return Redirect::to('administrador');
		}
	}

	public function deleteMateria()
	{
		if(Request::ajax()){
			$materia = Subject::find(Input::get('ideliminar'));
			if($materia->delete()){
				return Response::json(array(

					'success'=>true,
					'message'=>'Materia Borrada Correctamente.'

					));
			}else{

				return Response::json(array(
					'success'=>false,
					'message'=>'Error al Borrar la Materia'
					));

			}
		}else{
			return Redirect::to('administrador');
		}
	}

	public function editMateria()
	{
		if(Request::ajax()){
			$materia = Subject::find(Input::get('ideditar'));
			$materia->materia = strtoupper(Input::get('materiaedit'));
			if($materia->save()){
				return Response::json(array(
					'success'=>'true',
					'message'=>'Materia editada correctamente.'
					));
			}else{
				return Response::json(array(
					'success'=>'false',
					'message'=>$materia->errors()->toArray()
					));
			}
		}else{
			return Redirect::to('administrador');
		}
	}
	public function activarMateria()
	{
		if(Request::ajax()){
				$idactiva = Input::get('idactivar');
			if(Subject::withTrashed()->where('id',$idactiva)->restore()){
				return 'Materia Activada de nuevo';
			}else{
				return 'Ocurrio algun Error al activar esta materia, Intenta de nuevo';
			}
		}else{
			return Redirect::to('administrador');
		}
	}

	public function showMateriasInactivas(){
		if(Request::ajax()){
			$materiasinactivas = Subject::onlyTrashed()->get();
			return View::make('administrador.materias.materiasinactivas',array('materiasinactivas'=>$materiasinactivas));
		}else{
			return Redirect::to('administrador');
		}
	}

}