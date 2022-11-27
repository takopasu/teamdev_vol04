<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\StudentIndexController;

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

Route::get('/login', function () {
    return view('/auth/login');
});

Route::get('/admin_index', function () {
    return view('/admin/login/admin_index');
});

Route::get('/student_index', function () {
    return view('/admin/login/student_index');
});

Route::get('/mentor_calendar', function () {
    return view('/mentor_calendar');
});

Route::get('/student_calendar', function () {
    return view('/student_calendar');
});

Route::get('/mentor_calendar', function () {
    return view('/events/mentor_calendar');
});

Route::get('/student_calendar', function () {
    return view('/events/student_calendar');
});

Route::get('/register', function() {
    return view('/auth/register');
});

Route::post('/event-add', [EventController::class, 'eventAdd'])->name('event-add');
Route::post('/event-get', [EventController::class, 'eventGet'])->name('event-get');
Route::post('/event-show',[EventController::class,'eventShow'])->name('event-show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/login', [Admin\AdminLoginController::class, 'index'])->name('admin.login.index');
    Route::post('/login', [Admin\AdminLoginController::class, 'login'])->name('admin.login.login');
    Route::get('/logout', [Admin\AdminLoginController::class, 'logout'])->name('admin.login.logout');
});

// 管理者（mentorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定する。  
Route::prefix('admin')->middleware('auth:mentors')->group(function () {
    Route::get('/',[Admin\AdminIndexController::class, 'index'])->name('admin.index');
});

// // フロント
// use App\Http\Controllers;
// Route::get('/login', [Controllers\StudentLoginController::class, 'index'])->name('login.index');
// Route::post('/login', [Controllers\StudentLoginController::class, 'login'])->name('login.login');
// Route::get('/logout', [Controllers\StudentLoginController::class, 'logout'])->name('login.logout');
// Route::post('/admin_calendar', [Controllers\AdminIndexController::class, 'admin_index'])->name('admin_index');
// Route::post('/student_calendar', [Controllers\StudentIndexController::class, 'student_index'])->name('student_index');

require __DIR__.'/auth.php';
