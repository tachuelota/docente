<?php
class AulasController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			return View::make('administrador.aulas.index');
		}else{
			return Redirect::to('administrador');
		}
	}
	public function getTurnoAulas(){
		if(Request::ajax()){
			$turno = Shift::find(Input::get('turnoid'));
			$aulas = $turno->classrooms()->orderby('grado','asc')->orderby('grupo','asc')->get();
			return View::make('administrador.aulas.turnoaulas',compact('aulas'));
		}else
		{
			return Redirect::to('administrador');
		}
	}

	public function deleteAula()
	{
		if(Request::ajax()){
			$aula = Classroom::find(Input::get('ideliminar'));
			if($aula->delete()){
				return Response::json(array(
					'success'=>true,
					'message'=>'aula eliminada correctamente'
					));
			}else{
				return Response::json(array(
					'success'=>false,
					'message'=>'ocurrio un error al eliminar esta aula'
					));
			}
		}else{
			return Redirect::to('administrador');
		}
	}

	public function createAula()
	{
		if(Request::ajax()){
			
			$resultado = count(DB::table('aulas')->where('turno_id',Input::get('turno'))->where('grado',Input::get('grado'))->where('grupo',Input::get('grupo'))->get());

			if($resultado > 0){
				return Response::json(array(
					'success'=>false,
					'message'=>array('error'=>'Esta Aula ya existe')
					));
			}else{
				$turno = Shift::find(Input::get('turno'));
			
			$aula = new Classroom;
			$aula->grado = Input::get('grado');
			$aula->grupo = Input::get('grupo');

			if($turno->classrooms()->save($aula)){
				return Response::json(array(
					'success'=>true,
					'message'=>'Aula creada correctamente'
					));
			}else{
				return Response::json(array(
					'success'=>false,
					'message'=>$aula->errors()->toArray()
					));
			}
			}

			



		}else{
			return Redirect::to('administrador');
		}
	}
}