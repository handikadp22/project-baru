<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {

    $pegawailaki = Employee::where('jenis_kelamin', 'laki-laki')->count();
    $pegawaiperempuan = Employee::where('jenis_kelamin', 'perempuan')->count();
    $jumlahpegawai = Employee::count();

    return view('welcome', compact('jumlahpegawai', 'pegawaiperempuan', 'pegawailaki'));
})->middleware('auth');

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('/barang', [EmployeeController::class, 'barang'])->name('barang')->middleware('auth');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai')->middleware('auth');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [EmployeeController::class, 'tampildata'])->name('tampildata')->middleware('auth');
Route::post('/editpegawai/{id}', [EmployeeController::class, 'editpegawai'])->name('editpegawai');


Route::get('/hapusdata/{id}', [EmployeeController::class, 'hapusdata'])->name('hapusdata')->middleware('auth');

//export pdf
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');
//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
//register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
//logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/landing', [EmployeeController::class, 'landing'])->name('landing')->middleware('guest');
