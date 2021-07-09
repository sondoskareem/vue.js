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
Auth::routes();

Route::group(['prefix' => '/','middleware'=>'auth'], function () {

// Route::get('/{any}', function () {
//         return view('layouts.app');
//     })->where('any', '.*');

// Route::get('/{view?}', 'App\Http\Controllers\HomeController@landing')->where('view', '(.*)')->name('landing');

// Route::any('{all}', function () {
//     return view('layouts.app');
// })
//     ->where('all', '^(?!api).*$')
//     ->where('all', '^(?!storage).*$');


Route::get('/', function () {
    return view('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



Route::get('get/users', [App\Http\Controllers\UserController::class, 'index'])->name('Users.index');
Route::post('post/users', [App\Http\Controllers\UserController::class, 'store'])->name('Users.store');


});
