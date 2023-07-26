<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPicsController;
use App\Http\Controllers\PageController;

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



Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/show_album', function () {return redirect(route('index'));});//再読み込みで元のページに戻る処理
Route::post('/show_album', [PageController::class, 'showAlbum']);

Route::post('/user_pics', [PageController::class, 'userPics']);
Route::post('/show_master', [PageController::class, 'showMaster']);

Route::get('/', function () {return view('contents.index');})->middleware(['auth', 'verified'])->name('index');
Route::get('/about', function () {return view('contents.about');})->name('about');

Route::get('/pic_upload', function () {return view('contents.pic_upoad');})->name('pic_upload');
Route::get('/kojin', function () {return view('contents.kojin');})->name('kojin');
Route::get('/inquiry', function () {return view('contents.inquiry');})->name('inquiry');
Route::get('/show_album', function () {return redirect(route('index'));});//再読み込みで元のページに戻る処理
Route::post('/show_album', [PageController::class, 'showAlbum']);
Route::post('/user_pics', [PageController::class, 'userPics']);
Route::post('/show_master', [PageController::class, 'showMaster']);


Route::get('/guest_inquiry', function () {return redirect(route('inquiry'));});



Route::get('/pic_upload', function () {return view('users.pic_upload');})->middleware(['auth', 'verified'])->name('pic_upload');


Route::post('/save_pics', [UserPicsController::class,'savePics'])->middleware(['auth', 'verified']);
Route::post('/get_pics', [UserPicsController::class,'getPics'])->middleware(['auth', 'verified']);
Route::post('/get_master', [UserPicsController::class,'getMaster'])->middleware(['auth', 'verified']);
Route::post('/delete_pic', [UserPicsController::class,'deletePic'])->middleware(['auth', 'verified']);
Route::post('/save_title', [UserPicsController::class,'saveTitle'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
