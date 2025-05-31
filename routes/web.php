<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ParenttController;
use App\Http\Controllers\TumbuhKembangAnakController;
use App\Http\Controllers\AnggotaController;

use App\Models\Anak;
use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Imunisasi;
use App\Models\TumbuhKembangAnak;
use App\Models\Jadwal;
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

    return view('user.index', [
        'jumlahAnak' => Anak::count(),
        'imunisasiTahunIni' => Imunisasi::whereYear('tanggal', date('Y'))->count(), 
        'tumbuhKA' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->count(),
        'tumbuhKABI' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->count(),
        'jadwals' => Jadwal::where('status_libur', 0)->get(),
        'beritas' => Berita::latest()->limit(3)->get(),
        'anggotas' => Anggota::latest()->get()
    ]);
})->middleware('isParent');

Route::get('all-berita/{beritum}', [BeritaController::class, 'show'])->middleware('isParent');
Route::get('all-berita', [BeritaController::class, 'allBerita']);
Route::get('data-imunisasi/{anak}', [ImunisasiController::class, 'dataImunisasi'])->middleware('isParent');
Route::get('data-tumbuh-kembang-anak/{anak}', [TumbuhKembangAnakController::class, 'dataTKA'])->middleware('isParent');

Route::get('/dashboard', function() {
    return view('dashboard', [
        'jumlahAnak' => Anak::count(),
        'imunisasiTahunIni' => Imunisasi::whereYear('tanggal', operator: date('Y'))->count(), 
        'tumbuhKA' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->count(),
        'tumbuhKABI' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->count()
    ]);
})->middleware('isAdmin');

Route::resource('anak', AnakController::class)->middleware('isAdmin');
Route::resource('imunisasi', ImunisasiController::class)->middleware('isAdmin');
Route::resource('perkembangan-anak', TumbuhKembangAnakController::class)->middleware('isAdmin');
Route::resource('anggota', AnggotaController::class)->middleware('isAdmin');
Route::resource('berita', BeritaController::class)->middleware('isAdmin');
Route::resource('jadwal', JadwalController::class)->middleware('isAdmin');
Route::resource('parent', ParenttController::class)->middleware('isAdmin');

Route::post('cetakdataimunisasi', [ImunisasiController::class, 'cetak']);
Route::post('cetakdataperkembangan', [TumbuhKembangAnakController::class, 'cetak']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/set-admin', [AuthController::class, 'showAdmin'])->middleware('isAdmin');
Route::post('/set-admin/{user}', [AuthController::class, 'updateAdmin'])->middleware('isAdmin');

Route::get('/test', function() {
    return Auth::guard('admin')->check();
});

Route::get('/test2', function() {
    return Auth::guard('parent')->check();
});

Route::get('/login-user', [AuthController::class, 'loginUser']);
Route::post('/login-user', [AuthController::class, 'authenticateUser']);

Route::get('/cek-imunisasi-anak', [ImunisasiController::class, 'cekAnakImunisasi'])->middleware('isParent');

Route::get('/cek-tumbuh-kembang-anak', [TumbuhKembangAnakController::class, 'cekTKA'])->middleware('isParent');

Route::get('/profile', [ParenttController::class, 'show'])->middleware('isParent');