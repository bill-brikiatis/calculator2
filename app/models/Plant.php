<?php

class Plant extends Eloquent {

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
	
	public function gardeners() {
		return $this->belongsToMany('Gardener', 'gardeners_plants');
	}

}
