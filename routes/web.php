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

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){

Route::get('/', function () {
    return view('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('Users.index');
Route::get('users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('Users.show');
Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('Users.store');
Route::put('users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('Users.update');
Route::delete('users/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('Users.update');


Route::get('sessions', [App\Http\Controllers\SessionController::class, 'index'])->name('Sessions.index');
Route::post('sessions', [App\Http\Controllers\SessionController::class, 'store'])->name('Sessions.index');
Route::put('sessions/{id}', [App\Http\Controllers\SessionController::class, 'edit'])->name('Sessions.index');
Route::delete('sessions/{id}', [App\Http\Controllers\SessionController::class, 'delete'])->name('Sessions.index');


Route::get('{any}', function () {
    return  view('layouts.app');
})->where("any", ".*");


});

// });
