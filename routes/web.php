<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RoomController as AdminRoomController;
use App\Http\Controllers\admin\RoomImageController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\home\CommentController as HomeCommentController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\home\HomeController as HomeHomeController;
use App\Http\Controllers\home\RoomController as HomeRoomController;
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
Route::get('/get-province-cities-list', [AdminHomeController::class, 'getProvinceCitiesList']);

Route::name('home.')->group(function () {
    Route::get('/' , [HomeHomeController::class , 'index'])->name('index');
    Route::get('/rooms/search' , [HomeRoomController::class , 'searchRoom'])->name('room.search');
    Route::get('/posts' , [HomeHomeController::class , 'posts'])->name('posts');
    Route::get('/post/{post}' , [HomeHomeController::class , 'show_post'])->name('posts.show');
    Route::get('/rooms' , [HomeRoomController::class , 'index'])->name('room.index');
    Route::get('/rooms/{room}' , [HomeRoomController::class , 'show'])->name('room.show');
    Route::get('/tag/{tag:slug}' , [HomeHomeController::class , 'getPostByTag'])->name('posts.tag');
    Route::get('/category/{category:slug}' , [HomeHomeController::class , 'getPostByCategory'])->name('posts.category');
    Route::post('/rooms/booking' , [HomeRoomController::class , 'bookRoom'])->name('room.book')->middleware(['throttle:2,1']);
    Route::post('/comment' , [HomeCommentController::class , 'store'])->name('comment.store')->middleware(['throttle:2,1']);
});

Route::middleware('guest')->group(function (){
    Route::get('/login' , [UserController::class , 'loginToAdmin'])->name('login');
    Route::post('/login' , [UserController::class , 'handleLoginToAdmin'])->name('login.handle');
});

Route::prefix('admin_panel')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard' , [AdminHomeController::class , 'index'])->name('index');
    Route::post('/logout' , [UserController::class , 'logout'])->name('user.logout');

    Route::get('/room/images/{room}' , [RoomImageController::class , 'edit'])->name('room.edit_images');
    Route::post('/room/images/add_image' , [RoomImageController::class , 'add'])->name('room.add_image');
    Route::post('/room/images/delete_image' , [RoomImageController::class , 'destroy'])->name('room.delete_image');
    Route::get('/reservation/is_pay/{reservation}' , [ReservationController::class , 'changePay'])->name('reservation.change_pay');

    Route::get('/comment/{comment}' , [AdminCommentController::class , 'show'])->name('comment.show');
    Route::get('/comment' , [AdminCommentController::class , 'index'])->name('comment.index');
    Route::get('/comment/approve/{comment}' , [AdminCommentController::class , 'changeApprove'])->name('comment.changeApprove');
    Route::delete('/comment/{comment}' , [AdminCommentController::class , 'destroy'])->name('comment.destroy');

    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class)->except('show');
    Route::resource('room', AdminRoomController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('user', UserController::class);
});


