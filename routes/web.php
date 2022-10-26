<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\BumilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaderController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route Kader
route::get('/dashboard', [DashboardController::class, 'index']);
route::get('/kader', [KaderController::class, 'index']);
route::get('/kader/create', [KaderController::class, 'create']);
route::post('/kader/store', [KaderController::class, 'store']);
route::get('/kader/edit/{id}', [KaderController::class, 'edit']);
route::put('/kader/update/{id}', [KaderController::class, 'update']);
route::delete('/kader/delete/{id}', [KaderController::class, 'destroy']);

//Route Baltia
route::get('/balita', [BabyController::class, 'index']);
route::get('/balita/create', [BabyController::class, 'create']);
route::post('/balita/store', [BabyController::class, 'store']);
route::get('/balita/edit/{id}', [BabyController::class, 'edit']);
route::put('/balita/update/{id}', [BabyController::class, 'update']);
route::delete('/balita/delete/{id}', [BabyController::class, 'destroy']);

//route Artikel
route::get('/article', [ArticleController::class, 'index']);
route::get('/article/create', [ArticleController::class, 'create']);
route::post('/article/store', [ArticleController::class, 'store']);
route::get('/article/edit/{id}', [ArticleController::class, 'edit']);
route::put('/article/update/{id}', [ArticleController::class, 'update']);
route::delete('/article/delete/{id}', [ArticleController::class, 'destroy']);

//route bumil
route::get('/bumil', [BumilController::class, 'index']);
route::get('/bumil/create', [BumilController::class, 'create']);
route::post('/bumil/store', [BumilController::class, 'store']);
route::get('/bumil/edit/{id}', [BumilController::class, 'edit']);
route::put('/bumil/update/{id}', [BumilController::class, 'update']);
route::delete('/bumil/delete/{id}', [BumilController::class, 'destroy']);

//route export pdf
route::get('/exportpdf', [BumilController::class, 'exportpdf']);
route::get('/exportpdf', [KaderController::class, 'exportpdf']);
route::get('/exportpdf', [BabyController::class, 'exportpdf']);
