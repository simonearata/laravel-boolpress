<?php

/* use App\Http\Controllers\Admin\PostController; */
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

/* Route::get('/', 'PageController@index'); */

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        // tutte le rotte admin (il CRUD)
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/posts', 'PostController');
    });

// rotta che serve a vue per gestire tutte le rotte possibili alternative a quelle Auth e admin
Route::get('{any?}', 'PageController@index')->where('any','.*');
