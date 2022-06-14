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
    return view('site.pages.index');
});

Route::get('/dashboard', function () {
    return view('admin.pages.home');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group( function (){

});
require __DIR__.'/auth.php';
