<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;
class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 *
	 * @return mixed
	 */

	protected $fillable = array('username');

	protected $guarded = array('id','password');

	public $autoPurgeRedundantAttributes = true; 

	//auto has del password
	public static $passwordAttributes = array('password');
	public $autoHashPasswordAttributes = true ;
	///


	public static $rules = array(
		'username' => 'required|between:6,16|unique:users',
		'password' => 'required|alpha_num|between:8,20|confirmed',
		'password_confirmation' => 'required|alpha_num|between:8,20'
	
		);

	public static $customMessages = array(
		'unique' => 'este usuario ya existe, elige otro',
		'required' =>'este campo es reuqerido',
		'alpha_num' => 'ingresa solo numeros y letras'
		);

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


	public function role(){
		return $this->belongsTo('Role');
	}

	public function student(){
		return $this->hasOne('Student','user_id');
	}

	
}