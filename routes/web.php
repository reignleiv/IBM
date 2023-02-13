<?php

use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\IbmController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\Diskusi;
use App\Models\Ibm;
use App\Models\Komentar;
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
<<<<<<< HEAD
Route::resource('/dashboard/ibm', IbmController::class)->middleware('auth');
=======
Route::resource('/dashboard/ibm', IbmController::class);
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
Route::get('/dashboard/ibm', function () {
    return view('dashboard.dashboardibm.index', [
        'active' => 'IBM',
        "title" => "Semua Informasi Bahan Makanan",
        "ibms" => Ibm::all()
    ]);
<<<<<<< HEAD
})->middleware('auth');
=======
});
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794

//Diskusi
Route::get('/diskusi', [DiskusiController::class, 'index']);
// halaman single diskusi
<<<<<<< HEAD
Route::get('/diskusi/{diskusi:slug}', [DiskusiController::class, 'show']);
Route::resource('/dashboard/diskusi', DiskusiController::class)->middleware('auth');
Route::get('/diskusi', function () {
    $diskusi = Diskusi::latest();
        if (request('search')) {
            $diskusi->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return view('diskusi', [
            'active' => 'Diskusi',
            "title" => "Diskusi",
            "diskusis" =>   $diskusi->get()
        ]);
=======
Route::get('/diskusi{diskusi:slug}', [DiskusiController::class, 'show']);
Route::resource('/dashboard/diskusi', DiskusiController::class);
Route::get('/dashboard/diskusi', function () {
    return view('dashboard.diskusi.index', [
        'active' => 'diskusi',
        "title" => "Semua Informasi Diskusi",
        "diskusis" => Diskusi::all()
    ]);
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
});

Route::resource('/dashboard/user', UserController::class)->middleware('auth');


// Route::get('/komentar', [KomentarController::class, 'index']);
// halaman single diskusi
//Route::get('/komentar{komentar:slug}', [KomentarController::class, 'show']);
Route::resource('/dashboard/komentar', KomentarController::class);
// Route::get('/dashboard/komentar', function () {

//     return view('dashboard.komentar.index', [
//         'active' => 'komentar',
//         "title" => "Komentar",
//         "komentars" => Komentar::all()
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


<<<<<<< HEAD

=======
Route::get('/komentar', [KomentarController::class, 'index']);
// halaman single diskusi
Route::get('/komentar{komentar:slug}', [KomentarController::class, 'show']);
Route::resource('/dashboard/komentar', KomentarController::class);
Route::get('/dashboard/komentar', function () {
    return view('dashboard.komentar.index', [
        'active' => 'komentar',
        "title" => "Komentar",
        "komentars" => Komentar::all()
    ]);
});
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
// require __DIR__.'/auth.php';
