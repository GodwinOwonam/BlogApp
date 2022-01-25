<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('register', [AuthController::class, 'registerShow'])->name('register');
Route::post('registration', [AuthController::class, 'registration'])->name('registration');

Route::get('login', [AuthController::class, 'loginShow'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('userLogin');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard/{id}', [PostController::class, 'authorDashShow'])->name('authorDash');
Route::post('dashboard/{id}', [PostController::class, 'addNewPost'])->name('newPost');

Route::get('edit/{id}', [PostController::class, 'editPost'])->name('edit');
Route::post('updatePost/{id}', [PostController::class, 'updatePost'])->name('update');
Route::get('delete/{id}/{user_id}', [PostController::class, 'deletePost'])->name('delete');

Route::get('read-post/reader/{reader_id}', [PostController::class, 'readerDashShow'])->name('readerDash');

Route::get('comment/reader/{id}/{reader_id}', [PostController::class, 'addComment'])->name('addComment');
Route::post('addcomment/{id}/{reader_id}', [CommentController::class, 'addNewComment'])->name('addNewComment');

Route::get('/', function () {
    return redirect()->route('register');
});
