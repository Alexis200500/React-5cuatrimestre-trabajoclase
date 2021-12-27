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

// Route::get('/home', 'HomeController@index')->name('home');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/{path?}', [
//     'uses' => 'ReactController@show',
//     'as' => 'react',
//    // 'where' => ['path' => '!(api).*']
//     'where' => ['path' => '.*']
// ]);



Route::any('/{a?}', function(){
    return view('welcome');
})->where('a', '^(?!api\/).*$')->name('reactjs');

// Route::any('/{a?}', function () {
//     return vies('welcome');
// })->where('a', '^(?!api\/).*$')-name('reactjs');