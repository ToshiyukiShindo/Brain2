<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ChatsController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//mypage
//更新画面
Route::get('/useredit',[HomeController::class, 'edit']);
//更新処理
Route::post('/useredit/update',[HomeController::class, 'update']);


//questionsの投稿画面
Route::get('/questions', [QuestionsController::class, 'index']);
//questionsの投稿処理
Route::post('questions', [QuestionsController::class, 'store']);
//詳細画面への遷移
Route::get('/questionsdetail/{question}',[QuestionsController::class, 'detail']);
//chat画面への遷移
Route::get('/questionschat/{question}',[QuestionsController::class, 'chat']);
//更新画面
Route::get('/questionsedit/{question}',[QuestionsController::class, 'edit']);
//更新処理
Route::post('/questions/update',[QuestionsController::class, 'update']);
//削除
Route::delete('/question/{question}',[QuestionsController::class, 'destroy']);

//chatの投稿
Route::post('back', [ChatsController::class, 'store']);

//back
Route::get('/back', [App\Http\Controllers\HomeController::class, 'back']);