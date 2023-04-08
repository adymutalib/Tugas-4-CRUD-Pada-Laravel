<?php


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaController;
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
    return view('user.login');
});
// Route::get('/login', function () {
//     return view('user.login');
// });
Route::get('/l', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('mahasiswa.index');
});
Route::get('/pages', function () {
    return view('pages.index');
});

Route::resource('pages', PenggunaController::class)->name('index', 'pages');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


// Route::resource('pengguna', PenggunaController::class)->name('show', 'pengguna');

Route::resource('home', CarController::class)->name('show', 'index');

Route::resource('login', UserController::class)->name('index', 'login');
