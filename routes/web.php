<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShowBlogController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard.index');
// });

Route::resource("blog", BlogController::class)->middleware('auth');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('show-blog', [ShowBlogController::class, 'index'])->name('show-blog');
Route::get('read-blog/{slug}', [ShowBlogController::class, 'read'])->name('read-blog');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-validate', [LoginController::class, 'login'])->name('login-validate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


