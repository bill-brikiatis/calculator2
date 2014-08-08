<?php

class Frost extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//public $table = 'frosts';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//public $last_frost_date;
	//public $postal_code;
	
	protected $fillable = array('postal_Code', 'last_Frost_Date');
	
	public function gardeners() {
		return $this->hasMany('Gardener');
	}

}
