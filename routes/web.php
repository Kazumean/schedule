<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ブログ
// 記事の一覧表示
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// 記事新規作成画面の表示
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('auth');

// 記事の新規登録
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store')->middleware('auth');

// 記事の編集画面の表示
Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blogs.edit')->middleware('auth');

// 記事の更新
Route::put('/blogs/update/{blog}', [BlogController::class, 'update'])->name('blogs.update')->middleware('auth');

// 記事の削除
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth');


// スケジュール
// スケジュールの一覧表示
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');

// スケジュール新規作成画面の表示
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedule.create')->middleware('auth');

// スケジュールの新規登録
Route::post('/schedules/store', [ScheduleController::class, 'store'])->name('schedule.store')->middleware('auth');

// スケジュールの編集画面の表示
Route::get('/schedules/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedule.edit')->middleware('auth');

// スケジュール情報の更新
Route::put('/schedules/update/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update')->middleware('auth');

// スケジュールの削除
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy')->middleware('auth');