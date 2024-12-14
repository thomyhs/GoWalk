<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class,'register'])->name('auth.regsiter');
Route::post('/register/submit', [AuthController::class,'authRegister'])->name('register.submit');

Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::post('/login/submit', [AuthController::class,'authLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function() {

    Route::get('/index', [PostController::class, 'index'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.profile');
    Route::get('/show/{slug}', [PostController::class, 'postCategory'])->name('user.show');
    Route::get('/show/{slug}/post/{id}', [PostController::class, 'detailPost'])->name('user.detail');

    Route::post('/show/post/{id}/reviews/submit', [ReviewController::class, 'addReviews'])->name('review.submit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('profile.submit');
});