<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::post('/mahasiswa/update/{mahasiswa}', [MahasiswaController::class, 'update']);

Route::get('/kriteria', [KriteriaController::class, 'index']);
Route::post('/kriteria/update/{kriteria}', [KriteriaController::class, 'update']);
