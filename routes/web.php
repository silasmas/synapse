<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandeController;
use App\Http\Controllers\ContactController;
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


Route::get('/', [BandeController::class, 'home'])->name('home');
Route::post('sendmessage', [ContactController::class, 'store'])->name('sendmessage');
Route::post('newsletter', [ContactController::class, 'newsletter'])->name('newsletter');
Route::get('/admin', function () {
    return view('auth.login');
})->name('admin');

// Route::get('/dashboard', function () {
//     return view('admin.pages.home');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [BandeController::class, 'index'])->name('dashboard');
    // Route::get('G_branche', [BandeController::class, 'index'])->name('G_branche');
    Route::get('G_temoignage', [TemoignageController::class, 'index'])->name('G_temoignage');
    Route::get('G_partenaire', [PartenaireController::class, 'index'])->name('G_partenaire');

    Route::get('inserbranche', [BandeController::class, 'create'])->name('inserbranche');
    Route::get('inserservice', [serviceController::class, 'create'])->name('inserbande');
    Route::get('insertemoignage', [TemoignageController::class, 'create'])->name('insertemoignage');
    Route::get('inserpartenaire', [PartenaireController::class, 'create'])->name('inserpartenaire');

    Route::post('storeBranche', [BandeController::class, 'store'])->name('storeBranche');
    Route::post('storeService', [ServiceController::class, 'store'])->name('storeService');
    Route::post('storepartenaire', [PartenaireController::class, 'store'])->name('storepartenaire');
    Route::post('storetemoignage', [TemoignageController::class, 'store'])->name('storetemoignage');


    Route::get('detailBranche/{id}', [BandeController::class, 'show'])->name('detailBranche');
    Route::get('editService/{id}', [ServiceController::class, 'edit'])->name('editService');
    Route::get('editBrance/{id}', [BandeController::class, 'edit'])->name('editBrance');
    Route::get('editTemoignage/{id}', [TemoignageController::class, 'edit'])->name('editTemoignage');
    Route::get('editPartenaire/{id}', [PartenaireController::class, 'edit'])->name('editPartenaire');

    Route::post('updateService', [ServiceController::class, 'update'])->name('updateService');
    Route::post('updateBranche', [BandeController::class, 'update'])->name('updateBranche');
    Route::post('updateTemoignage', [TemoignageController::class, 'update'])->name('updateTemoignage');
    Route::post('updatePartenaire', [PartenaireController::class, 'update'])->name('updatePartenaire');

    Route::get('deleteService/{id}', [ServiceController::class, 'destroy'])->name('deleteService');
    Route::get('deleteBranche/{id}', [BandeController::class, 'destroy'])->name('deleteBranche');
    Route::get('deleteTemoignage/{id}', [TemoignageController::class, 'destroy'])->name('deleteTemoignage');
    Route::get('deletePartenaire/{id}', [PartenaireController::class, 'destroy'])->name('deletePartenaire');
});
require __DIR__ . '/auth.php';
