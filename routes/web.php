<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name("Login");
Route::post('/login', [LoginController::class, 'login'])->name("setlogin");
Route::get('/register', [RegisterController::class, 'index'])->name("Register");
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name("ResetPassword");
Route::get('/admin', [DashboardController::class, 'getData'])->name("admin");
Route::get('/data-jabatan', [JabatanController::class, 'index'])->name("data-jabatan");
// Route::get('/tambah-jabatan', [JabatanController::class, 'add'])->name("tambah-jabatan");


// CRUD UNIT
Route::get('/data-unit', [UnitController::class, 'index'])->name("data-unit");
Route::get('/tambah-unit', [UnitController::class, 'add'])->name("tambah-unit");
Route::get('/edit-unit', [UnitController::class, 'edit'])->name("edit-unit");
Route::post('/create-unit', [UnitController::class, 'create'])->name("create-unit");
Route::post('/destroy-unit', [UnitController::class, 'destroy'])->name("destroy-unit");
Route::put('/update-unit', [UnitController::class, 'update'])->name("update-unit");

Route::get('/tambah-karyawan', [KaryawanController::class, 'add'])->name("tambah-karyawan");
Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name("data-karyawan");
Route::post('/create-karyawan', [KaryawanController::class, 'create'])->name("create-karyawan");
Route::post('/destroy-karyawan', [KaryawanController::class, 'destroy'])->name("destroy-karyawan");
Route::get('/edit-karyawan', [KaryawanController::class, 'edit'])->name("edit-karyawan");
Route::put('/update-karyawan', [KaryawanController::class, 'update'])->name("update-karyawan");


// CRUD JABATAN
Route::get('/tambah-jabatan', [JabatanController::class, 'add'])->name("tambah-jabatan");
Route::post('/create-jabatan', [JabatanController::class, 'create'])->name("create-jabatan");
Route::get('/edit-jabatan', [JabatanController::class, 'edit'])->name("edit-jabatan");
Route::put('/update-jabatan', [JabatanController::class, 'update'])->name("update-jabatan");
Route::post('/destroy-jabatan', [JabatanController::class, 'destroy'])->name("destroy-jabatan");
