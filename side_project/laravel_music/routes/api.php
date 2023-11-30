<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BoardsController;
use App\Http\Controllers\ChartsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//middleware('apiChkToken')->
// Route::prefix('boards')->group(function () {
//     Route::get('/', [BoardsController::class, 'index']);
//     Route::get('/{board}', [BoardsController::class, 'show']);
//     Route::post('/', [BoardsController::class, 'store']);
// });

Route::prefix('chart')->group(function () {
    Route::get('/musixmatchchart', [ChartsController::class, 'sendMusixMatchChart'])->name('chart.musixmatchchart');
    Route::get('/vibechart', [ChartsController::class, 'sendVibeChart'])->name('chart.vibechart');
});

// 일치하는거 없을 때
Route::fallback(function(){
    return response()->json([
        'code' => 'E03'
    ], 404);
});