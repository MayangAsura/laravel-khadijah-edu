<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome', ['title' => 'Laravel - KhadijahDev']);
});

Route::get('dashboard', function () {
    return view('home');
});

//ATURAN:
//edulevel = route, EdulevelController = Controller, data = method dalam controller

//utk SELECT DATA
Route::get('edulevels', 'EdulevelController@data'); 
//utk KE HALAMAN ADD DATA
Route::get('edulevels/add', 'EdulevelController@add'); 
    //utk ADD DATA
    Route::post('edulevels', 'EdulevelController@addProcess'); 

//utk KE HALAMAN EDIT DATA
Route::get('edulevels/edit/{id}', 'EdulevelController@edit'); 
    //utk EDIT DATA
    Route::patch('edulevels/{id}', 'EdulevelController@editProcess'); 
    
 //utk DELETE DATA
Route::delete('edulevels/{id}', 'EdulevelController@delete');

Route::get('foo', function () {
    return 'Hello';
});

Route::get('program/trash', 'ProgramController@trash' ); //CUSTOM ROUTE
Route::get('program/restore/{id?}', 'ProgramController@restore' ); 
Route::get('program/delete_permanent/{id?}', 'ProgramController@delete_permanent' ); 

Route::resource('program', 'ProgramController'); // ROUTE RESOURCE

Route::get('pengajar/trash', 'PengajarController@trash');
Route::get('pengajar/restore/{id?}', 'PengajarController@restore');
Route::get('pengajar/delete_permanent/{id?}', 'PengajarController@delete_permanent');

Route::resource('pengajar', 'PengajarController'); 

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
