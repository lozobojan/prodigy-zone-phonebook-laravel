<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// testne rute
Route::get('/pocetna', [HomeController::class, 'getHomePage'] );
Route::get('/kontakt/{id}/detalji', [HomeController::class, 'getContactDetails'] );
Route::get('/contact/save', [HomeController::class, 'saveContact'] );

// Contact routes
Route::get('/contacts', [ContactController::class, 'index'] )->name('contact.index');
Route::get('/contacts/create', [ContactController::class, 'create'] )->name('contact.create');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'] )->name('contact.edit');
Route::post('/contacts', [ContactController::class, 'save'])->name('contact.save');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('contact.delete');
