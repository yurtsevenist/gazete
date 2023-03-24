<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
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
Route::get('login', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});
Route::get('forget', function () {
    return view('auth.forget');
});

Route::post('loginPost', [UserController::class, 'loginPost'])->name('loginPost');
Route::post('registerPost', [UserController::class, 'registerPost'])->name('registerPost');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/forget-password', [UserController::class, 'postEmail'])->name('postEmail');
Route::get('/{token}/reset-password', [UserController::class, 'getPassword'])->name('getPassword');
Route::post('/reset-password', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::get('/', [MenuController::class, 'index'])->name('main');
Route::get('/getir/{id}', [MenuController::class, 'getir'])->name('getir');
Route::get('/yazargetir/{id}', [MenuController::class, 'yazargetir'])->name('yazargetir');
Route::get('/catgetir/{id}', [MenuController::class, 'catgetir'])->name('catgetir');
Route::get('yazarGet', [MenuController::class, 'yazarGet'])->name('yazarGet');

Route::get('gazeteGet', [MenuController::class, 'gazeteGet'])->name('gazeteGet');

Route::post('gazeteUpload', [MenuController::class, 'gazeteUpload'])->name('gazeteUpload');
Route::group(['middleware' => ['auth', 'verified', 'isAdmin']], function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/yazarekle', [MenuController::class, 'yazarekle'])->name('yazarekle');
    Route::get('/gazeteekle', [MenuController::class, 'gazeteekle'])->name('gazeteekle');
    Route::get('/catekle', [MenuController::class, 'catekle'])->name('catekle');
    Route::post('dosyaUpload', [MenuController::class, 'dosyaUpload'])->name('dosyaUpload');

    Route::post('catUpload', [MenuController::class, 'catUpload'])->name('catUpload');
    Route::post('catDelete', [MenuController::class, 'catDelete'])->name('catDelete');
    Route::post('gazeteDelete', [MenuController::class, 'gazeteDelete'])->name('gazeteDelete');
    Route::post('yazarDelete', [MenuController::class, 'yazarDelete'])->name('yazarDelete');
    Route::get('catGet', [MenuController::class, 'catGet'])->name('catGet');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

Route::get('hesap', [MenuController::class, 'hesap'])->name('hesap');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('profil', [UserController::class, 'profilguncelle'])->name('profil');
Route::get('favorite', [MenuController::class, 'favorite'])->name('favorite');
Route::get('/favgetir', [MenuController::class, 'favgetir'])->name('favgetir');

});
