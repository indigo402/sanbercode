<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
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
// sudah buat branch

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'register']);

Route::post('/welcome', [AuthController::class, 'welcome']);

Route::get('/', [HomeController::class, 'home']);

Route::get('/table', function(){
    return view('halaman.table');
});

Route::get('/data-table', function(){
    return view('halaman.datatable');
});

//CRUD game

//Create
//Form Tambah game
Route::get('/game/create', [GameController::class, 'create']);
//Untuk kirim data ke database atau tambah data ke database
Route::post('/game', [GameController::class, 'store']);

//Read
//Menampilkan data
Route::get('/game', [GameController::class, 'index']);
//Detail game berdasarkan id
Route::get('/game/{game_id}', [GameController::class, 'show']);

//Update
//Form Update Data game
Route::get('/game/{game_id}/edit', [GameController::class, 'edit']);
//Update Data ke Database berdasarkan id
Route::put('/game/{game_id}', [GameController::class, 'update']);

//Delete
//Delete berdasarkan id
Route::delete('/game/{game_id}', [GameController::class, 'destroy']);
