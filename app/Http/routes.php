<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

Route::get('/', 'HomeController@index');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');
Route::resource('corporations', 'CorporationController');
Route::resource('casinos', 'CasinoController');
Route::resource('restaurants', 'RestaurantController');

Route::resource('machines', 'MachineController');
Route::resource('machinereadings', 'MachineReadingsController');
Route::resource('logoptions', 'LogOptionController');

Route::resource('logrequests', 'LogRequestsController');


//Export
Route::get('get-corporation-export', 'ExcelController@getCorporationExport');
Route::get('get-casino-export', 'ExcelController@getCasinoExport');
Route::get('get-restaurant-export', 'ExcelController@getRestaurantExport');
Route::get('get-machine-export', 'ExcelController@getMachineExport');
Route::get('get-logoption-export', 'ExcelController@getLogOptionExport');
Route::get('get-machinereading-export', 'ExcelController@getMachineReadingExport');
Route::get('get-logrequest-export', 'ExcelController@getLogRequestExport');
Route::get('get-fryer-export', 'ExcelController@getFryerExport');
Route::get('get-yellow-grease-pickup-export', 'ExcelController@getYellowGreasePickupExport');
Route::get('get-fryerTMPS-export', 'ExcelController@getFryerTMPS');
Route::get('get-trash-bin-export', 'ExcelController@getTrashBin');
Route::get('get-history-usage-export', 'ExcelController@getHistoryUsage');

//Autocomplete
Route::get('get-autocomplete-machines-options', 'AutoCompleteController@getMachineAutoComplete');
Route::get('get-autocomplete-logoptions-options', 'AutoCompleteController@getLogOptionAutoComplete');
Route::get('get-autocomplete-restaurants-options', 'AutoCompleteController@getRestaurantAutoComplete');
Route::get('get-autocomplete-fryers-options', 'AutoCompleteController@getFryerAutoComplete');
Route::get('get-autocomplete-fryer-options', 'AutoCompleteController@getFryerAutoComplete');
Route::get('get-autocomplete-corporation-options', 'AutoCompleteController@getCorporationAutoComplete');
Route::get('get-autocomplete-casino-options', 'AutoCompleteController@getCasinoAutoComplete');

Route::resource('fryers', 'FryerController');

Route::resource('yellowGreasePickups', 'YellowGreasePickupController');

Route::resource('fryerTMPSs', 'FryerTMPSController');

Route::resource('trashBins', 'TrashBinController');

Route::resource('historyUsages', 'HistoryUsageController');

Route::resource('clientLogins', 'ClientLoginController');