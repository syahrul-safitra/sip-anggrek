<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\JadwalController;
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
})->middleware('guest');

Route::get('all-berita/{beritum}', [BeritaController::class, 'show'])->middleware('guest');
Route::get('all-berita', [BeritaController::class, 'allBerita'])->middleware('guest');
Route::get('data-imunisasi', [ImunisasiController::class, 'dataImunisasi'])->middleware('guest');
Route::get('data-tumbuh-kembang-anak', [TumbuhKembangAnakController::class, 'dataTKA'])->middleware('guest');

Route::get('/dashboard', function() {
    return view('dashboard', [
        'jumlahAnak' => Anak::count(),
        'imunisasiTahunIni' => Imunisasi::whereYear('tanggal', operator: date('Y'))->count(), 
        'tumbuhKA' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->count(),
        'tumbuhKABI' => TumbuhKembangAnak::whereYear('tanggal', date('Y'))->count()
    ]);
})->middleware('auth')->name('home');

Route::resource('anak', AnakController::class)->middleware('auth');
Route::resource('imunisasi', ImunisasiController::class)->middleware('auth');
Route::resource('perkembangan-anak', TumbuhKembangAnakController::class)->middleware('auth');
Route::resource('anggota', AnggotaController::class)->middleware('auth');
Route::resource('berita', BeritaController::class)->middleware('auth');
Route::resource('jadwal', JadwalController::class)->middleware('auth');

Route::post('cetakdataimunisasi', [ImunisasiController::class, 'cetak']);
Route::post('cetakdataperkembangan', [TumbuhKembangAnakController::class, 'cetak']);

Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/set-admin', [AuthController::class, 'showAdmin'])->middleware('auth');
Route::post('/set-admin/{user}', [AuthController::class, 'updateAdmin'])->middleware('auth');