<?php

use App\Http\Controllers\DashboardIbmController;
use App\Http\Controllers\IbmController;
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
Route::resource('/dashboard/ibm', DashboardIbmController::class);
// Route::get('/dashboard', function() {
//     return view('dashboard.dashboardibm.index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

require __DIR__.'/auth.php';
