<?php

use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\IbmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\Diskusi;
use App\Models\Ibm;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IbmController::class, 'index']);
Route::resource('/dashboard/ibm', IbmController::class);
Route::get('/dashboard/ibm', function () {
    return view('dashboard.dashboardibm.index', [
        'active' => 'IBM',
        "title" => "Semua Informasi Bahan Makanan",
        "ibms" => Ibm::all()
    ]);
});

//Diskusi
Route::get('/diskusi', [DiskusiController::class, 'index']);
// halaman single diskusi
Route::get('/diskusi{diskusi:slug}', [DiskusiController::class, 'show']);
Route::resource('/dashboard/diskusi', DiskusiController::class);
Route::get('/dashboard/diskusi', function () {
    return view('dashboard.diskusi.index', [
        'active' => 'diskusi',
        "title" => "Semua Informasi Diskusi",
        "diskusis" => Diskusi::all()
    ]);
});

Route::resource('/dashboard/user', UserController::class);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

// require __DIR__.'/auth.php';
