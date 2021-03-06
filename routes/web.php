<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/api-tokens', 'APIController@index');

    Route::get('companies', 'CompanyController@index')->name('companies');
    Route::get('companies/create', 'CompanyController@create');
    Route::get('companies/{company}', 'CompanyController@show');
    Route::get('companies/{company}/edit', 'CompanyController@edit');
    Route::patch('companies/{company}', 'CompanyController@update');
    Route::post('companies', 'CompanyController@store');

    Route::get('companies/{company}/logo/create', 'CompanyController@createLogo');
    Route::post('companies/{company}/logo', 'CompanyController@storeLogo');

    Route::get('companies/{company}/employees', 'EmployeeController@index')->name('employees');
    Route::get('companies/{company}/employees/create', 'EmployeeController@create');
    Route::get('companies/{company}/employees/{employee}', 'EmployeeController@show');
    Route::get('companies/{company}/employees/{employee}/edit', 'EmployeeController@edit');
    Route::patch('companies/{company}/employees/{employee}', 'EmployeeController@update');
    Route::post('companies/{company}/employees', 'EmployeeController@store');
});

Route::group(['middleware' => 'can:create,App\User'], function () {
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::get('users/{user}', 'UserController@show');
    Route::get('users/{user}/edit', 'UserController@edit');
    Route::patch('users/{user}', 'UserController@update');
    Route::post('users', 'UserController@store');
    Route::patch('users/{user}/add-role', 'UserController@addRole');
    Route::patch('users/{user}/add-company', 'UserController@addCompany');
});
