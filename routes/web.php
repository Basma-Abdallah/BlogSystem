<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});
Route::get('/', [PostController::class, 'index'])->name('index');

Route::resource('posts', PostController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
