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

    # Prossess Frost Date
    public function postFrost() {
    	
		$postal = Input::get('postal_code');
			$frosts = Frost::where('postal_Code', '=', $postal)->first();
			
			if ($frosts):
				$last_frost = $frosts->last_Frost_Date;
				return View::make('select-plants')->with('last_frost', $last_frost);
			else:
					return View::make('frost')->with('flash_message', 'Please enter a postal code.');
			endif;
	}
}