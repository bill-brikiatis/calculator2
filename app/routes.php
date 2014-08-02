<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# /app/routes.php
Route::get('/practice-creating', function() {

    # Instantiate a new Frost model class
    $frost = new Frost();

    # Set 
    $frost->last_Frost_Date = 'June 15, 2015';
    $frost->postal_Code = '03087';

    # This is where the Eloquent ORM magic happens
    $frost->save();
	
	return "A row has been added.";

});

Route::get('/index', function() {
	
	 $frosts = Frost::where('postal_Code', '=', '03087')->first();
	 $your_last_frost_date = "This is your last frost date $frosts->last_Frost_Date .";
   		
   	 return View::make('index')
		->with('your_last_frost_date', $your_last_frost_date);
	
});

Route::get('/practice-updating', function() {

    # First get a frost date to update
    $frosts = Frost::where('postal_Code', '=', '03087')->first();
	

    # Make the change in the row
    $frosts->last_Frost_Date = 'June 1, 2014';
	$frosts->postal_Code = '03084';

    # Save the changes
    $frosts->save();

    //return  $your_last_frost_date = "This is your last frost date $frosts->last_Frost_Date .";
    return "Check your table.";

});

Route::get('/practice-deleting', function() {

    # First get a book to delete
     $frosts = Frost::where('postal_Code', '=', '03087')->first();

    # Goodbye!
    $frosts->delete();

    return "Deletion complete; check the database to see if it worked...";

});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


Route::get('/mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Paste\Pre::render($results);

});






// SHOW PAGES

// Show Sign In Form
Route::get('/create-password',
    array(
        'before' => 'guest',
        function() {
            return View::make('create-password');
        }
    )
);

// Show Create Password Form
Route::post('/', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->email    = Input::get('email');

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/find-frost')->with('flash_message', 'You are signed in');

        }
    )
);

// Show Last Frost Date Form
Route::get('/planting-date-calculator1', 'PlantsController@planting-date-calculator1');

// Show Last Frost Date & Plant Form Checkboxes
Route::get('/planting-date-calculator2', 'PlantsController@planting-date-calculator2');

// Show Planting Dates
Route::get('/planting-date-calculator3', 'PlantsController@planting-date-calculator3');

// Show Admin Interface Form
Route::get('/frost-admin', function() {
	
	return View::make('/frost-admin');
});

//HANDLE SUBMISSION FORMS

// Process Password
Route::post('/process-pw', 'PlantsController@process-password');

// Create Password
//Route::post('/create-password', 'PlantsController@create-password');
//	return View::make('frost');

// Find Last Frost Date
Route::post('/frost', 'PlantsController@frost');

// Create Plant List
Route::post('/plants', 'PlantsController@plants');

// Calculate Dates
Route::post('/dates', 'PlantsController@dates');

// Process postal codes
Route::post('/zip', 'PlantsController@zip');

// Process enter postal codes
Route::post('/admin-frost', 'PlantsController@postEnterFrost');
