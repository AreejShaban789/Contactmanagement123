<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/',[ContactController::class,'index'])->name('home1');
Route::get('/',[ContactController::class,'index'])->name('contact.index');
Route::get('/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/store',[ContactController::class,'store'])->name('contact.store');
Route::get('/edit/{id}', [ContactController::class,'edit'])->name('contact.edit');
Route::post('/update/{id}', [ContactController::class,'update'])->name('contact.update');
Route::get('/delete/{id}', [ContactController::class,'delete'])->name('contact.delete');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
