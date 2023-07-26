<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\MakePdfController;

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

Route::get('/', [PageController::class,'top']);

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/get_city_list',[PageController::class,'getCity']);
Route::get('/dd_test', function () {return view('contents.drug_drop');});
Route::get('/dd_test2', function () {return view('contents.drug_drop2');});
Route::get('/sort', [PageController::class,'sortList']);
Route::post('/save_list',[PageController::class,'saveList']);
Route::post('/save_list2',[PageController::class,'saveList2']);
Route::get('/photo',[PageController::class,'photo']);
Route::get('/ptest', function () {return view('contents.phototest');});

Route::get('/pdf_main',[PdfController::class,'pdf_main'])->name('pdf_main');
Route::post('/pdf_save',[PdfController::class,'save_Pdf']);
Route::post('/delete_pdf',[PdfController::class,'delete_Pdf']);
Route::post('/load_pdf',[PdfController::class,'load_Pdf']);
Route::get('/pdf_test', function () {return view('pdf.test_pdf');});
Route::get('/make_pdf',[MakePdfController::class,'make_pdf']);
Route::get('/test_pdf',[MakePdfController::class,'test_pdf']);
Route::get('/nohin_pdf',[MakePdfController::class,'nohin']);
Route::get('/nohin_test',[MakePdfController::class,'nohintest_pdf']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
