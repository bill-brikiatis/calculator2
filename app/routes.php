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
    $frost->last_Frost_Date = 'May 15, 2015';
    $frost->postal_Code = '03087';

    # This is where the Eloquent ORM magic happens
    $frost->save();

    return 'A new frost date has been added! Check your database to see...';

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




Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Pre::render($results);

});






// SHOW PAGES

// Show Sign In Form
Route::get('/', 'PlantsController@index');

// Show Create Password Form
Route::get('/pw', 'PlantsController@pw');

// Show Last Frost Date Form
Route::get('/planting-date-calculator1', 'PlantsController@planting-date-calculator1');

// Show Last Frost Date & Plant Form Checkboxes
Route::get('/planting-date-calculator2', 'PlantsController@planting-date-calculator2');

// Show Planting Dates
Route::get('/planting-date-calculator3', 'PlantsController@planting-date-calculator3');

// Show Admin Interface Form
Route::get('/admin', 'admin');

//HANDLE SUBMISSION FORMS

// Process Password
Route::post('/process-pw', 'PlantsController@process-password');

// Create Password
Route::post('/create-pw', 'PlantsController@create-password');

// Find Last Frost Date
Route::post('/frost', 'PlantsController@frost');

// Create Plant List
Route::post('/plants', 'PlantsController@plants');

// Calculate Dates
Route::post('/dates', 'PlantsController@dates');

// Process Zip Codes
Route::post('/zip', 'PlantsController@zip');
