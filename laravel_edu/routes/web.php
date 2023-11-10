<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// -----------------
// 라우트 정의
// -----------------
// php 에서는 js의 콜백함수를 클로저라고 함 (거의 같은 기능?)

// 1. 문자열 리턴
Route::get('/hi', function () {
    return '안녕하세요';
});

// 2. 없는 뷰파일 리턴
//.env의 APP_DEBUG=true 이기 때문에 에러 부분 보여줌
//APP_DEBUG=false 이면 에러번호와 에러이름 보여줌
Route::get('/myview', function () {
    return view('myview');
});

// -----------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행
// -----------------
// get메소드로 localhost/home으로 접속했을 때 home라는 뷰파일을 리턴해주세요
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return '메소드 POST';
});

Route::put('/home', function () {
    return '메소드 PUT';
});

Route::delete('/home', function () {
    return '메소드 DELETE';
});

// -----------------
// 라우트에서 파라미터 제어
// -----------------
// 쿼리 스트링일 때 파라미터가 셋팅되서 요청이 올 때 파라미터 획득
Route::get('/query', function (Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function ($id) {
    return '세그먼트 파라미터 : '.$id;
});

// 2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id,$name) {
    return '세그먼트 파라미터 2개 이상 : '.$id.','.$name;
});

Route::get('/segment2/{id}/{name}', function (Request $request) {
    return '세그먼트 파라미터 2개 이상 : '.$request->id.','.$request->name;
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
// id값에 아무것도 안적으면 디폴트로 base가 들어감
Route::get('/segment3/{id?}', function ($id='base') {
    return 'segment3 : '.$id;
});

// -----------------
// 라우트 매칭 실패시 대체 라우트 정의
// -----------------
Route::fallback(function () {
    return '이상한 URL을 입력하셨습니다.';
});

// -----------------
// 라우트의 이름 지정
// -----------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/root', function () {
    return '이름 있는 라우트';
})->name('name.user');

// -----------------
// 컨트롤러
// -----------------
// 커맨드로 컨틀롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index');

// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);