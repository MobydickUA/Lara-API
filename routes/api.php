<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'json'], function () {

	Route::get('/employees','EmployeeController@index');
	
	Route::get('/employees/search', 'EmployeeController@search');

	Route::get('/employees/{emp}', 'EmployeeController@show');

	Route::get('/employees/{emp}/titles', 'EmployeeController@titles');

	Route::get('/employees/{emp}/salaries', 'EmployeeController@salaries');

	Route::get('/employees/{emp}/departments', 'EmployeeController@departments');

	Route::get('/employees/{emp}/subordinates', 'EmployeeController@subordinates');

	Route::get('/departments', 'DepartmentController@index');

	Route::get('/departments/{dep}', 'DepartmentController@show');

	Route::get('/departments/{dep}/employees', 'DepartmentController@employees');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
