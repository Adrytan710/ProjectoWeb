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

Route::get('/', 'Inicio@index');




Auth::routes();

Route::get('home','HomeController@index')->name('dashboard');
Route::get('/pagos/{id}','Admin\PagamentsController@pagos');
Route::group(['middleware' => ['auth','admin']],function() {

    Route::get('/dashboard', function (){
        return view('admin.dashboard');
        });
        Route::get('/role-register','Admin\DashboardController@registered');
        Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
        Route::put('role-register-update/{id}','Admin\DashboardController@registerupdate');
        Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');
        Route::post('/save-usuarios','Admin\DashboardController@store');
        

        Route::get('/categories','Admin\CategoriesController@index');
        Route::post('/save-categories','Admin\CategoriesController@store');
        Route::get('/categories/{id}','Admin\CategoriesController@edit');
        Route::put('/categories-update/{id}','Admin\CategoriesController@update');
        Route::delete('/categories-delete/{id}','Admin\CategoriesController@delete');
   
        Route::get('/cursos','Admin\CursosController@index');
        Route::post('/save-cursos','Admin\CursosController@store');
        Route::get('/cursos/{id}','Admin\CursosController@edit');
        Route::put('/cursos-update/{id}','Admin\CursosController@update');
        Route::delete('/cursos-delete/{id}','Admin\CursosController@delete');
   
        Route::get('/comptes','Admin\ComptesController@index');
        Route::post('/save-comptes','Admin\ComptesController@store');
        Route::get('/comptes/{id}','Admin\ComptesController@edit');
        Route::put('/comptes-update/{id}','Admin\ComptesController@update');
        Route::delete('/comptes-delete/{id}','Admin\ComptesController@delete');
   
        Route::get('/pagaments','Admin\PagamentsController@index');
        Route::post('/save-pagaments','Admin\PagamentsController@store');
        Route::get('/pagaments/{id}','Admin\PagamentsController@edit');
        Route::put('/pagaments-update/{id}','Admin\PagamentsController@update');
        Route::delete('/pagaments-delete/{id}','Admin\PagamentsController@delete');

       
   
    });
   
    




