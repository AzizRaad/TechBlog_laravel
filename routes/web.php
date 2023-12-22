<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
//Main page Routes
Route::get('/', [UserController::class, 'ShowCorrectHomepage'])->name('login');

//User Routes
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile/{user:username}', [UserController::class, 'profile']);

//Post Routes
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);
Route::post('/create-post', [PostController::class, 'storePost']);
Route::get('/create-post', [PostController::class, 'creatingPost'])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, 'updatePost'])->middleware('can:update,post');