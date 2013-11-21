<?php
class RegistroController extends BaseController{
	public function getRegistro(){
		return View::make('registro');
	}
	public function postRegistro(){
		if(Request::ajax()){
		$registro = new User;
		$registro->username = Input::get('username');
		$registro->password = Input::get('password');
		$registro->password_confirmation = Input::get('password_confirmation');
		$rol = Role::find(2);
		if($rol->users()->save($registro)){
			return Response::json(array(
				'success' => true,
				'message'=>'Usuario Creado Correctamente'
				));
		}else{
			return Response::json(array(
				'success'=>false,
				'message'=>$registro->errors()->toArray()
				));
		}

	}else{
		return Redirect::to('registro');
	}
	}
}