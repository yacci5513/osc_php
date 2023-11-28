<?php

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


// 나중에 에러 페이지로 가게끔 수정해줘야함
// 토큰 있으면 json 없으면 에러페이지로
Route::get('/', function(){
    return view('welcome');
});

Route::fallback(function(){
    return response()->json([
        'code' => 'E03'
    ], 404);
});