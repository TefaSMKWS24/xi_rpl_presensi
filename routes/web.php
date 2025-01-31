<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalMapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MapelGuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\WaliSiswaController;
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
    return view('welcome');
});

Route::resource('absensi', absensiController::class);
Route::resource('admin', AdminController::class);
Route::resource('guru', GuruController::class);
Route::resource('jadwal_mapel', JadwalMapelController::class);
Route::resource('kelas', KelasController::class);
Route::resource('login', LoginController::class);
Route::resource('mapel', MapelController::class);
Route::resource('mapel_guru', MapelGuruController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('siswa_kelas', SiswaKelasController::class);
Route::resource('wali_siswa', WaliSiswaController::class);



Route::middleware(['guest:admin'])->group(function(){
    Route::get('/guru', function(){return view ('auth.loginadmin') ;})->name('loginadmin');
    Route::post('loginadmin', [AuthController::class, 'loginadmin']);
});
Route::middleware(['guest:guru'])->group(function(){
    Route::get('/guru', function(){return view ('auth.loginguru') ;})->name('loginguru');
    Route::post('loginguru', [AuthController::class, 'loginguru']);
});
Route::middleware(['guest:siswa'])->group(function(){
    Route::get('/guru', function(){return view ('auth.loginsiswa') ;})->name('loginsiswa');
    Route::post('loginsiswa', [AuthController::class, 'loginsiswa']);
});



Route::middleware(['auth:admin'])->group(function(){
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AuthController::class, 'logoutadmin']);

    Route::resource('absensi', absensiController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('jadwal_mapel', JadwalMapelController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('login', LoginController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('mapel_guru', MapelGuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('siswa_kelas', SiswaKelasController::class);
    Route::resource('wali_siswa', WaliSiswaController::class);
});
Route::middleware(['auth:guru'])->group(function(){
    Route::get('/guru/dashboard', [DashboardAdminController::class, 'dashboard']);
    Route::get('/guru/logout', [AuthController::class, 'logoutguru']);

    Route::resource('absensi', absensiController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('jadwal_mapel', JadwalMapelController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('login', LoginController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('mapel_guru', MapelGuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('siswa_kelas', SiswaKelasController::class);
    Route::resource('wali_siswa', WaliSiswaController::class);
});
Route::middleware(['auth:siswa'])->group(function(){
    Route::get('/siswa/dashboard', [DashboardAdminController::class, 'dashboard']);
    Route::get('/siswa/logout', [AuthController::class, 'logoutsiswa']);

    Route::resource('absensi', absensiController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('jadwal_mapel', JadwalMapelController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('login', LoginController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('mapel_guru', MapelGuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('siswa_kelas', SiswaKelasController::class);
    Route::resource('wali_siswa', WaliSiswaController::class);

});



