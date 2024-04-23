<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\KategoriModel;
use Monolog\Level;

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

Route::get('/level',[LevelController::class,'index']);
Route::get('/kategori',[KategoriController::class,'index']);
//Praktikum 6 – Implementasi Eloquent ORM
Route::get('/user',[UserController::class,'index']);
Route::get('/user',[UserController::class,'index'])->name('/user');
Route::get('/user/tambah',[UserController::class,'tambah'])->name('/user/tambah');
Route::get('/user/ubah/{id}',[UserController::class,'ubah'])->name('/user/ubah');
Route::get('/user/hapus/{id}',[UserController::class,'hapus'])->name('/user/hapus');
Route::post('/user/tambah_simpan/',[UserController::class,'tambah_simpan'])->name('/user/tambah_simpan');
Route::get('/kategori', [KategoriController::class,'index']);
//<!-- Jobheet 5 tugas praktikum 1 ,Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori
//baru -->
//<!-- Jobheet 6 bagian B -->
Route::get('/kategori/create',[KategoriController::class,'create'])->name('create');
Route::post('/kategori', [KategoriController::class,'store']);

//<!-- Jobheet 5 tugas praktikum 3 ,TTambahkan action edit di datatables dan buat halaman edit serta controllernya -->
Route::get('/kategori/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/edit_simpan/{id}',[KategoriController::class,'edit_simpan'])->name('kategori.edit_simpan');

//<!-- Jobheet 5 tugas praktikum 4 ,Tambahkan action delete di datatables serta controllernya -->
Route::get('/kategori/hapus/{id}',[KategoriController::class,'hapus'])->name('kategori.hapus');

//<!-- Jobheet 6 bagian A -->
Route::get('/level/tambah', [LevelController::class, 'create']) ->name('level.create');
Route::post('/level', [LevelController::class, 'store']) ->name('level.store');
Route::get('/level/edit/{id}', [LevelController::class, 'edit']) ->name('level.edit');
Route::put('/level/update/{id}', [LevelController::class, 'update']) ->name('level.update');
Route::get('/level/delete/{id}', [LevelController::class, 'delete']) ->name('level.delete');

//<!-- Jobheet 6 bagian D -->
Route::resource('m_user', POSController::class);


//<!-- Jobheet 7 praktikum 2 bagian 5 -->
Route::get('/',[WelcomeController::class,'index']);

//<!-- Jobheet 7 praktikum 3 bagian 3 -->
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);                        // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);                    // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);                 // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);                       // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);                     // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);                // menampilkan halaman form edit user //
    Route::put('/{id}', [UserController::class, 'update']);                   // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);               //menghapus data user
    });

//<!-- Jobheet 7 TUGAS-->
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);                        // menampilkan halaman awal user
    Route::post('/list', [LevelController::class, 'list']);                    // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);                 // menampilkan halaman form tambah user
    Route::post('/', [LevelController::class, 'store']);                       // menyimpan data user baru
    Route::get('/{id}', [LevelController::class, 'show']);                     // menampilkan detail user
    Route::get('/{id}/edit', [LevelController::class, 'edit']);                // menampilkan halaman form edit user //
    Route::put('/{id}', [LevelController::class, 'update']);                   // menyimpan perubahan data user
    Route::delete('/{id}', [LevelController::class, 'destroy']);               //menghapus data user
    });

Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);                        // menampilkan halaman awal user
        Route::post('/list', [KategoriController::class, 'list']);                    // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [KategoriController::class, 'create']);                 // menampilkan halaman form tambah user
        Route::post('/', [KategoriController::class, 'store']);                       // menyimpan data user baru
        Route::get('/{id}', [KategoriController::class, 'show']);                     // menampilkan detail user
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);                // menampilkan halaman form edit user //
        Route::put('/{id}', [KategoriController::class, 'update']);                   // menyimpan perubahan data user
        Route::delete('/{id}', [KategoriController::class, 'destroy']);               //menghapus data user
        });
// Jobsheet 9
 Route::get('login',[AuthController::class, 'index'])->name('login');
 Route::get('register', [AuthController::class, 'register'])->name('register');
 Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
 Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
 
// kita atur juga untuk middleware menggunakan group pada routing
// didalammnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan manager maka akan diarahkan ke UserController

Route::group(['middleware' => ['auth']], function (){
    Route::group(['middleware' =>['cek_login:1']], function () {
        Route:: resource('admin', AdminController::class);
    });
    Route::group(['middleware' =>['cek_login:2']], function () {
        Route:: resource('manager', ManagerController::class);
    });
});
