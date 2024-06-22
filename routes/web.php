<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ModalitasController;
use App\Http\Controllers\DicomController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\PendaftaranPemeriksaanController;
use App\Http\Controllers\PendaftaranPemeriksaanKaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'dokter'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
    Route::post('/dokter/detailbiodata/store', [DokterController::class, 'storedetailbio'])->name('detailbiodokter.store');

    // Route::get('/dokter/dashboard', function(){
    //     return view('dokter.dashboard');
    // })->name('dokter.dashboard');
});

Route::middleware(['auth', 'karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('karyawan.dashboard');
    Route::post('/karyawan/detailbiodata/store', [KaryawanController::class, 'storedetailbio'])->name('detailbiokaryawan.store');

    Route::get('/karyawan/modalitas/list', [\App\Http\Controllers\ModalitasController::class, 'index'])->name('modalitas.list');
    //route dibawah ini untuk membuat nama yang berakhiran s tetap bisa digunakan
    Route::resource('karyawan/modalitas', ModalitasController::class)->parameters([
        'modalitas' => 'modalitas',
    ]);

    Route::get('/karyawan/dicom/list', [\App\Http\Controllers\DicomController::class, 'index'])->name('dicom.list');
    Route::resource('karyawan/dicom', DicomController::class);

    Route::get('/karyawan/jenispemeriksaan/list', [\App\Http\Controllers\JenisPemeriksaanController::class, 'index'])->name('jenispemeriksaan.list');
    Route::resource('karyawan/jenispemeriksaan', JenisPemeriksaanController::class);

    Route::get('/karyawan/pendaftaranpemeriksaan/list', [\App\Http\Controllers\PendaftaranPemeriksaanKaryawanController::class, 'index'])->name('karyawan.pendaftaranpemeriksaan.list');
    Route::get('/karyawan/pendaftaranpemeriksaan/{id}', [\App\Http\Controllers\PendaftaranPemeriksaanKaryawanController::class, 'show'])->name('karyawan.pendaftaranpemeriksaan.show');
    Route::get('/karyawan/pendaftaranpemeriksaan/download/{file}', [\App\Http\Controllers\PendaftaranPemeriksaanKaryawanController::class, 'download'])->name('karyawan.file.download');
    Route::get('/karyawan/pendaftaranpemeriksaan/{id}/edit', [\App\Http\Controllers\PendaftaranPemeriksaanKaryawanController::class, 'edit'])->name('karyawan.pendaftaranpemeriksaan.edit');
    Route::put('/karyawan/pendaftaranpemeriksaan/{id}', [\App\Http\Controllers\PendaftaranPemeriksaanKaryawanController::class, 'update'])->name('karyawan.pendaftaranpemeriksaan.update');
});

Route::middleware(['auth', 'pasien'])->group(function () {
    Route::get('/dashboard', [PasienController::class, 'index'])->name('dashboard');
    Route::post('/detailbiodata/store', [PasienController::class, 'storedetailbio'])->name('detailbio.store');

    Route::get('/pasien/pendaftaranpemeriksaan/list', [\App\Http\Controllers\PendaftaranPemeriksaanController::class, 'index'])->name('pendaftaranpemeriksaan.list');
    Route::get('/pasien/pendaftaranpemeriksaan/download/{file}', [\App\Http\Controllers\PendaftaranPemeriksaanController::class, 'download'])->name('file.download');
    Route::resource('pasien/pendaftaranpemeriksaan', PendaftaranPemeriksaanController::class);

    // Route::get('/pasien/detailbiodata', function(){
    //     return view('pasien.detailbiodata');
    // })->name('detailbiodata');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/user/list',[UserController::class, 'index'] )->name('user.list');
    Route::resource('admin/user', UserController::class);

    // Route::get('/admin/pasien/list', [PasienController::class, 'index'])->name('pasien.list');
    // Route::get('/admin/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    // Route::post('/admin/pasien', [PasienController::class, 'store'])->name('pasien.store');
    // Route::get('/admin/pasien/{id}/edit', [PasienController::class, 'index'])->name('pasien.edit');
    // Route::put('/admin/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
});

// Route::get('/dashboard', function(){
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
