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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');//for logout
Route::get('/','Auth\LoginController@login');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::group(["middleware" => "prevent-back-history"], function(){
Route::get('/home', 'HomeController@index');
Route::group(['prefix'=>'companies'],function(){
    Route::get('/','CompaniesController@index');
    Route::get('/show','CompaniesController@show');
    Route::post('/create','CompaniesController@create');
    Route::get('/{id}/edit','CompaniesController@edit');
    Route::post('/{id}/edit','CompaniesController@update');
    Route::get('/{id}/destroy','CompaniesController@destroy');
});
Route::group(['prefix'=>'employees'],function(){
    Route::get('/','EmployeesController@index');
    Route::get('/show','EmployeesController@show');
    Route::post('/create','EmployeesController@create');
    Route::get('/{id}/edit','EmployeesController@edit');
    Route::post('/{id}/edit','EmployeesController@update');
    Route::get('/{id}/destroy','EmployeesController@destroy');
});
Route::get('/test','TestController@index');
Route::post('/test','TestController@showUploadFile');
});

//////
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');