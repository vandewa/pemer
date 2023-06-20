<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Pages\User\UserPage;
use App\Http\Livewire\Pages\User\DaftarUser;
use App\Http\Livewire\Master\PerjanjianTipe;
use App\Http\Livewire\Master\DokumenJenis;
use App\Http\Livewire\Master\Instansi;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('docs', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('master/tipe-perjanjian', PerjanjianTipe::class)->name('tipe.perijinan');
    Route::get('master/jenis-perjanjian', DokumenJenis::class)->name('jenis.perijinan');
    Route::post('/ganti-password', [DashboardController::class, 'gantiPassword'])->name('ganti.password');
    Route::get('user/{id?}', UserPage::class)->name('user');
    Route::get('user-index', DaftarUser::class)->name('user.index');
    Route::get('master/instansi', Instansi::class)->name('master.instansi');
});
