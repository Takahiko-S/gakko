<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

//Route::get('/', function () { return view('welcome');});
Route::get('/', [BlogController::class,'top'])->name('index');

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');//middlewareがあればログインしてみれる

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/edit', [BlogController::class,'edit']);
    Route::get('/edit', function () {return redirect(route('index'));});
    Route::post('/delete', [BlogController::class,'delete']);
    Route::post('/edit_save', [BlogController::class,'editSave']);
    Route::get('/new', function () { return view('contents.new');})->name('new');
    Route::post('/new_save', [BlogController::class,'newSave']);
    
});

require __DIR__.'/auth.php';
