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
	
	return View::make('index');
	
});

// Lock down route & prevent non-authorized users

Route::get('frost-admin', 
	
	array(
		'before' => 'auth',
		'before' => 'admin',
		function($format = 'html') {
	
		return View::make('frost-admin');

}));



Route::get('frost', 

	array(
		'before' => 'auth',
		function($format = 'html') {
	
	return View::make('frost');
	
}));


// Show lost frost date 
Route::get('/select-plants',

	array(
		'before' => 'auth',
		function($format = 'html') {
	
	return View::make('select-plants');
}));


Route::get('/select-plants', function() {
	
	return View::make('/index');
	
});

// ROUTES TO CONTROLLERS


Route::post('/frost', 'PlantsController@postFrost');


// Process enter postal codes
Route::post('/admin-frost', 'PlantsController@postEnterFrost');