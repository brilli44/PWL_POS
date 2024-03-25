<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Models\KategoriModel;

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