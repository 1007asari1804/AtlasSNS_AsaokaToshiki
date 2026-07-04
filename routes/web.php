<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
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



require __DIR__ . '/auth.php';




Route::middleware('auth')->group(function(){
  Route::get('/top', [PostsController::class, 'index']);

  Route::get('/profile', [ProfileController::class, 'profile']);

  Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

  // Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile.other');

  Route::get('/search', [UsersController::class, 'search']);

  Route::get('/follow-list', [FollowsController::class, 'followList']);
  Route::get('/follower-list', [FollowsController::class, 'followerList']);

  Route::get('/posts/create', [PostsController::class, 'postCreate']);

  Route::post('/posts/{id}/update', [PostsController::class, 'update']);

  Route::get('/posts/{id}/delete', [PostsController::class, 'delete']);

  Route::post('/follow/{user}', [FollowsController::class, 'store'])->name('follow');
  Route::delete('/unfollow/{user}', [FollowsController::class, 'destroy'])->name('unfollow');
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
