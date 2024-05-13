<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\BarangController as ApiBarangController;
use App\Http\Controllers\Api\UserController as ApiUserController;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', RegisterController::class)->name('register');

Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');

Route::post('/login', LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/logout', LogoutController::class)->name('logout');

Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);

// Tugas
Route::get('users', [ApiUserController::class, 'index']);
Route::post('users', [ApiUserController::class, 'store']);
Route::get('users/{user}', [ApiUserController::class, 'show']);
Route::put('users/{user}', [ApiUserController::class, 'update']);
Route::delete('users/{user}', [ApiUserController::class, 'destroy']);

Route::get('barangs', [ApiBarangController::class, 'index']);
Route::post('barangs', [ApiBarangController::class, 'store']);
Route::get('barangs/{barang}', [ApiBarangController::class, 'show']);
Route::put('barangs/{barang}', [ApiBarangController::class, 'update']);
Route::delete('barangs/{barang}', [ApiBarangController::class, 'destroy']);

Route::get('kategoris', [KategoriController::class, 'index']);
Route::post('kategoris', [KategoriController::class, 'store']);
Route::get('kategoris/{kategori}', [KategoriController::class, 'show']);
Route::put('kategoris/{kategori}', [KategoriController::class, 'update']);
Route::delete('kategoris/{kategori}', [KategoriController::class, 'destroy']);
