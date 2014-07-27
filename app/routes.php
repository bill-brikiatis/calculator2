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
