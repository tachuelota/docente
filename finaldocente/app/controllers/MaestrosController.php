<?php
class MaestrosController extends BaseController{

	public function showMaestrosInactivos()
	{
		if(Request::ajax()){
			$maestrosinactivos = Teacher::onlyTrashed()->get();
			return View::make('administrador.maestros.maestrosinactivos',array('maestrosinactivos'=>$maestrosinactivos));
		}else{
			return Redirect::to('administrador');
		}
	}

	public function activarMaestro()
	{
		if(Request::ajax()){
				$idactiva = Input::get('idactivar');
			if(Teacher::withTrashed()->where('id',$idactiva)->restore()){
				return 'Maestro activado de nuevo';
			}else{
				return 'Ocurrio algun Error al activar esta maestro, Intenta de nuevo';
			}
		}else{
			return Redirect::to('administrador');
		}
	}


	public function getIndex(){
		if(Request::ajax()){
			$maestros = Teacher::all();
			$maestrosinactivos = Teacher::onlyTrashed()->get();
			return View::make('administrador.maestros.index',array('maestros'=>$maestros,'maestrosinactivos'=>$maestrosinactivos));
		}else{
			return Redirect::to('administrador');
		}
	}

	public function showMaestros()
	{
		if(Request::ajax()){
			$maestros = Teacher::all();
			return View::make('administrador.maestros.show',compact('maestros'));
		}else{
			return Redirect::to('administrador');
		}
	}

	public function postMaestro()
	{
		if(Request::ajax()){

			$maestro = new Teacher;
			$maestro->nombre = strtoupper(Input::get('maestro'));

			if($maestro->save()){
				return Response::json(array(
				'success'=>'true',
				'message'=>'maestro creado'
				));
			}else{

			}

			
		}else{
			return Redirect::to('administrador');
		}
	}

	public function editMaestro()
	{
		if(Request::ajax()){
			$maestro = Teacher::find(Input::get('ideditar'));
			$maestro->nombre = strtoupper(Input::get('maestroedit'));

			if($maestro->save()){
				return Response::json(array(

					'success'=>'true',
					'message'=>'maestro editado correctamente'

					));
			}else{
				return Response::json(array(
					'success'=>'false',
					'message'=>$maestro->errors()->toArray()
					));
			}
		}else{
			return Redirect::to('administrador');
		}
	}

	public function deleteMaestro()
	{
		if(Request::ajax()){
			$maestro = Teacher::find(Input::get('ideliminar'));
			if($maestro->delete()){
				return Response::json(array(
					'success'=>'true',
					'message'=>'Maestro eliminado correctamente'
					));
			}
			else{
				return Response::json(array(
					'success'=>'false',
					'message'=>'Error al eliminar este maestro'
					));
			}
		}else{
			return Redirect::to('administrador');
		}
	}
}