<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\TemoignageController;

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
    Route::get('inserbranche', [BandeController::class,'create'])->name('inserbranche');
    Route::get('inserservice', [serviceController::class,'create'])->name('inserbande');
    Route::get('insertemoignage', [TemoignageController::class,'create'])->name('insertemoignage');
    Route::get('inserpartenaire', [PartenaireController::class,'create'])->name('inserpartenaire');
    
    Route::post('storeBranche', [BandeController::class,'store'])->name('storeBranche');
    Route::post('storeService', [ServiceController::class,'store'])->name('storeService');
    Route::post('storepartenaire', [PartenaireController::class,'store'])->name('storepartenaire');
    Route::post('storepartenaire', [PartenaireController::class,'store'])->name('storepartenaire');

});
require __DIR__.'/auth.php';
