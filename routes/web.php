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


// All Add 
Route::get('add-all', 'CountryController@allStore')->name('country.store');
Route::get('remove-all', 'CountryController@removeAll')->name('country.removeall');


// Country Route
Route::get('add-country', 'CountryController@store')->name('country.store');
Route::get('add-country-by-iso3/{iso}', 'CountryController@iso3Store')->name('country.isostore');


// State Route
Route::get('add-state', 'StateController@store')->name('state.store');
Route::get('add-state-by-country-id/{id}', 'StateController@stateByCountryStore')->name('state.countryidstore');


// City Route
Route::get('add-city', 'CityController@store')->name('city.store');
Route::get('add-city-by-state-id/{id}', 'CityController@stateIdCityStore')->name('city.stateidcitystore');
Route::get('add-city-by-country-id/{id}', 'CityController@countryIdCityStore')->name('city.countryidcitystore');
