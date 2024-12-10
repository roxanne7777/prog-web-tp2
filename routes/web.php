<?php
use App\Controllers\ClientController;
use App\Controllers\HomeController;
use App\Controllers\InstrumentController;
use App\Controllers\RentalController;
use App\Controllers\PaiementController;
use App\Routes\Route;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Route::get('/clients', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');

Route::get('/instruments', 'InstrumentController@index');  
Route::get('/instrument/show', 'InstrumentController@show');

Route::get('/rentals', 'RentalController@index');  
Route::get('/rental/show', 'RentalController@show');  
Route::get('/rental/create', 'RentalController@create');  
Route::post('/rental/create', 'RentalController@store');  
Route::get('/rental/edit', 'RentalController@edit');  
Route::post('/rental/edit', 'RentalController@update');  
Route::post('/rental/delete', 'RentalController@delete');

Route::get('/paiements', 'PaiementController@index'); 
Route::get('/paiement/show', 'PaiementController@show');

Route::dispatch();

?>