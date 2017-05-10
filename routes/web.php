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
Route::group(['middleware' => 'auth'], function(){


	Route::resource('user', 'UserController');
	Route::resource('registration', 'RegistrationController', ['except' => ['create', 'store']]);
	Route::get('/confirma-inscricao/{id}', 'RegistrationController@confirmaInscricao')->name('registration.confirm_registration');
	Route::get('/desconfirma-inscricao/{id}', 'RegistrationController@desconfirmaInscricao')->name('registration.unconfirm_registration');
	Route::get('/home', 'UserController@index')->name('home');
	Route::get('/admin', 'RegistrationController@index');
});


Route::get('/', 'RegistrationController@create');
Route::get('/selecione-categoria', 'RegistrationController@selectCategory')->name('registration.select_category');
Route::get('/cadastro-competidor', 'RegistrationController@create')->name('registration.create');
Route::post('/registration/store', 'RegistrationController@store')->name('registration.store');
Route::get('/inscritos', "RegistrationController@publicIndex");


Auth::routes();


