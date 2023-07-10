<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Master\Instansi;
use App\Http\Livewire\Pages\Permohonan\Pengajuan;
use App\Http\Livewire\Master\DokumenJenis;
use App\Http\Livewire\Pages\User\UserPage;
use App\Http\Livewire\Master\PerjanjianTipe;
use App\Http\Livewire\Pages\User\DaftarUser;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShowPictureHelperController;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Permohonan\PengajuanDaftar;
use App\Http\Livewire\Pages\Permohonan\PengajuanProses;
use App\Http\Livewire\Pages\PublishList;
use App\Http\Livewire\Pages\User\PermissionRole;

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
    Route::group(['middleware' => 'profile.completed'], function () {
        Route::get('show-picture}', [ShowPictureHelperController::class, 'showPicture'])->name('helper.show-picture');
        Route::get('pengajuan', Pengajuan::class)->name('pengajuan');
        Route::get('pengajuan/user', PengajuanDaftar::class)->name('pengajuan.daftar');
        Route::get('pengajuan/proses', PengajuanProses::class)->name(('pengajuan.proses'));
        Route::get('master/tipe-perjanjian', PerjanjianTipe::class)->name('tipe.perijinan');
        Route::get('master/jenis-perjanjian', DokumenJenis::class)->name('jenis.perijinan');
        Route::get('master/instansi', Instansi::class)->name('master.instansi');
        Route::get('user/permission', PermissionRole::class)->name('permission.role');
        Route::post('/ganti-password', [DashboardController::class, 'gantiPassword'])->name('ganti.password');
        Route::get('user-index', DaftarUser::class)->name('user.index');
    });
    Route::get('user', UserPage::class)->name('profile');
});
Route::get('home', Home::class)->name('home');
Route::get('publish', PublishList::class)->name('publish');
Route::get('cekWA', [Controller::class, 'cekWA'])->name('cekWA');
