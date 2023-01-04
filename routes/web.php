<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//指定App\Http\Controllers\Controller來為Route的web.php做回傳功能的分工
use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;

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

// 這是預設設定
// Route::get('/', function () {
//     return view('welcome');
// });

//讓Controller為web.php分工的寫法，'index'是Controller內自訂的函式的名稱
Route::get('/', [Controller::class, 'index']);


/////////////////////////////////////////////

// 新增路由測試
Route::get('/test', function () {
    return view('welcome');
});
Route::get('/say', function () {
    return "Hello world";
    // 不透過view而只是傳送字串
});

//測試連到自己的網站(導航與回傳都由web.php做)
// Route::get('/cyberworld', function () {
//     return view('cyberworld');
//
// });

//讓Controller為web.php分工的寫法，'cyberindex'是Controller內自訂的函式的名稱
Route::get('/cyberworld', [NewsController::class, 'index']);
//這種寫法最上面記得要導入NewsController路徑use App\Http\Controllers\NewsController;

//(可讀取)另一個指定讀取自訂Controller(NewsController)的方法
// Route::get('/cyberworld', 'App\Http\Controllers\NewsController@index');

//連結到留言板頁面
Route::get('/comment', [NewsController::class, 'comment']);


/////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
