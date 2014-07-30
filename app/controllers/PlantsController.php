<?php

class PlantsController  extends BaseController {


    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
	
	public function postEnterFrost() {
		Route::get('/frost-admin', function() {
			
			$admin_frost_date = input::

		    # Instantiate a new Frost model class
		    $frost = new Frost();
		
		    # Set 
		    $frost->last_Frost_Date;
		    $frost->postal_Code = '03087';
		
		    # This is where the Eloquent ORM magic happens
		    $frost->save();
			
			return "A row has been added.";

});
		
	}

    # This is an action...
    public function getSignup() {


    }

    # This is an action...
    public function postSignup() {


    }

    # This is an action...
    public function getLogin() {


    }

    # This is an action...
    public function postLogin() {


    }

}