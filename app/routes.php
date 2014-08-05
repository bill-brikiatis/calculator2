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

/*Route::get('/frost', function() {
	
	
	
	 $frosts = Frost::where('postal_Code', '=', '03087')->first();
	 $your_last_frost_date = "This is your last frost date $frosts->last_Frost_Date .";
   		
   	 return View::make('/frost')
		->with('your_last_frost_date', $your_last_frost_date);
	
});*/

Route::get('/practice-deleting', function() {

    # First get a book to delete
     $frosts = Frost::where('postal_Code', '=', '03087')->first();

    # Goodbye!
    $frosts->delete();

    return "Deletion complete; check the database to see if it worked...";

});

// Susan's debug script

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

// Susan's database test

Route::get('/mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Paste\Pre::render($results);

});






// AUTHENTICATION PROCESS

// Show Sign In Form
Route::get('/create-password',
    array(
        'before' => 'guest',
        function() {
            return View::make('create-password');
        }
    )
);

// Process new passwords

Route::post('/create-password', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new Gardener;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->gardener_Role = Input::get('gardener_Role');

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/create-password')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/frost')->with('flash_message', 'You are signed in!');

        }
    )
);

// Logout
Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the home page
    return Redirect::to('/');

});

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);

Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');
			$gardeners = Gardener::all();
			foreach($gardeners as $gardener) {
				if ($gardener->email == $credentials['email']) {
					$role =  $gardener->gardener_Role;
				}
			}
			

			if ((Auth::attempt($credentials, $remember = true)) && ($role == 'Admin')) {
				return Redirect::to('/frost-admin')->with('flash_message', 'You are the Admin');
			}
			
			elseif (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/frost')->with('flash_message', 'Welcome Back!');
            }

			else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again or <a href="create-password">new user register here</a>.');
            }

            return Redirect::to('/');
        }
    )
);


// Show home
Route::get('/', function() {
	
	return View::make('/index');
	
});


// Show Admin Interface Form
Route::get('/frost-admin', function() {
	
	return View::make('frost-admin');
});


// Show Admin Interface Form & filter out non-admin
/*Route::get('/frost-admin', array(
	'before' => 'admin',
	function() {
	
		return View::make('frost-admin');
		}
));*/



Route::get('/frost', function() {
	
	return View::make('frost');
});


// Show lost frost date & select plants
Route::get('/select-plants', function() {
	
	return View::make('select-plants');
});

Route::post('/frost', 'PlantsController@postFrost');


// Process enter postal codes
Route::post('/admin-frost', 'PlantsController@postEnterFrost');
