<?php

class PlantsController  extends BaseController {
	
	public function postEnterFrost() {
			
			$admin_frost = Input::all();

		    # Instantiate a new Frost model class
		    // $frost = new Frost();
			
			// Check if the postal code is in the database
			$entered_postal = Frost::where('postal_Code', '=', $admin_frost['postal_code'])->first();
				if($entered_postal) {
					# Reset postal code
					$entered_postal->last_Frost_Date = $admin_frost['last_frost_date'];
				}
				else {
					# Set new values
					$entered_postal = new Frost();
		    		$entered_postal->postal_Code = $admin_frost['postal_code'];
		    		$entered_postal->last_Frost_Date = $admin_frost['last_frost_date'];
				}
		
		    # This is where the Eloquent ORM magic happens
		    $entered_postal->save();
			
			return "<a href='/frost-admin'>Enter another</a> or go <a href='/index'>Home</a>";

	}

    # Prosse
    public function postfrost() {
    	
		$frost_table = Input::all();
		$frosts = Frost::where('postal_Code', '=', '03087')->first();
	 	$your_last_frost_date = "This is your last frost date $frosts->last_Frost_Date .";
   		
   	 return View::make('select-plants')
		->with('your_last_frost_date', $your_last_frost_date);

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