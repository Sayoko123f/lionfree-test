<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\api\NewsController as NewsData;


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
    return view('index');
})->name('index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::get('/home', [NewsController::class, 'index'])->name('home');
// Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('admin.index');
    Route::get('/show/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});
Route::prefix('api')->group(function () {
    Route::get('news', [NewsData::class, 'index'])->name('news.index');
    Route::get('news/{id}', [NewsData::class, 'show'])->name('news.show');
});


Route::any('{all}', function () {
    return view('index');
})->where('all', '^(?!api).*$');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
