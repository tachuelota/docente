<?php
class LoginController extends BaseController{
	public function getLogOut(){
		Auth::logout();
		return Redirect::to('login');
	}
	public function getLogin(){
		return View::make('login');
	}
	public function postLogin(){
		if(Request::ajax()){
			$data = Input::all();
			$usuario = Input::get('username');
			$contrasena = Input::get('password');
			$reglasValidacion = array(
				'username'=>array('required','between:6,16','exists:users,username'),
				'password'=>array('required','between:8,20','alpha_num')
				);
			$mensagesError = array(
				'required'=>'este campo es requerido',
				'exists'=>'Este usuario no existe',
				'alpha_num'=>'Ingresa solo numeros y letras'
				);

			$validarLogin = Validator::make($data, $reglasValidacion, $mensagesError);

			if($validarLogin->passes()){
				$credenciales = array(
					'username'=>$usuario,
					'password'=>$contrasena
					);
				if(Auth::attempt($credenciales)){
					if(Auth::user()->role_id == 1){
					return Response::json(array(
						'success'=>true,
						'rol'=>'1'
						));
				}else if(Auth::user()->role_id ==2){
					
					return Response::json(array(
						'success'=>true,
						'rol'=>'2'
						));
				}
				}else{
					return Response::json(array(
						'success'=>'errorDatos',
						'message'=>'Usuario y/o Contraseña incorrectos'
						));
				}
			}else{
				return Response::json(array(
					'success'=>'errorValidacion',
					'message'=>$validarLogin->errors()->toArray()
					));
			}
		}else{
			return Redirect::to('login');
		}
	}
}