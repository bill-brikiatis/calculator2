<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Gardener extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gardeners';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('email', 'password', 'gardener_Role');
	
	public function gardeners() {
		return $this->belongsToMany('Gardener', 'gardeners_plants');
	}
	
	public function frosts() {
		return $this->hasOne('Frost');
	}
	
	public function plants() {
		return $this->belongsToMany('Plant');
	}

}