<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('products','ProductController');

    //Users
	Route::get('users', 'UserController@index')->name('users.list');
	Route::get('users/create', 'UserController@create')->name('users.create');
	Route::post('users', 'UserController@store')->name('users.store');
	Route::delete('users/{id}', 'UserController@destroy')->name('users.delete');
	//End Users

	//Profiles

	Route::get('profiles/create', 'ProfileController@create')->name('profiles.create');
	Route::get('profiles/{user_id}', 'ProfileController@show')->name('profiles.show');
	Route::get('profiles/{id}/edit', 'ProfileController@edit')->name('profiles.edit');
	Route::post('profiles', 'ProfileController@store')->name('profiles.store');
	Route::put('profiles/{id}', "ProfileController@update")->name('profiles.update');
	//End Profile

	//Dropdown
	Route::get('dropdown', 'DropdownController@index');
	Route::get('getCountries', 'DropdownController@getCountries');
	Route::get('getStates/{country_id}', 'DropdownController@getStates');
	Route::get('getCities/{state_id}', 'DropdownController@getCities');
	//End Dropdown
});