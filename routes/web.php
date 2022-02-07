<?php

use App\Http\Controllers;
use App\Http\Middleware\DashboardMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/contact', [Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/mail/contact/send', [Controllers\ContactController::class, 'send'])->name('contact.send');

/**
 * Forum Routes
 */
Route::get('forum', [Controllers\ForumController::class, 'index'])->name('forum.index');

Route::prefix('forum/{sub_category}')->group(function () {
        Route::get('/', [Controllers\Forums\SubCategoryController::class, 'show'])->name('forum.sub_category.show');
        Route::get('{topic}', [Controllers\Forums\TopicController::class, 'show'])->name('forum.topic.show');

        Route::middleware('auth')->group(function () {
        Route::post('/', [Controllers\Forums\TopicController::class, 'store'])->name('forum.topic.store');
        Route::post('{topic}', [Controllers\Forums\AnswerController::class, 'store'])->name('forum.answer.store');
    });
});

/**
 * Chat Routes
 */
Route::prefix('chat')->group(function () {
    Route::get('/', [Controllers\Chat\RoomController::class, 'show'])->name('chat.index');
    Route::get('{room}', [Controllers\Chat\RoomController::class, 'show'])->name('room.show');

    Route::middleware('auth')->group(function () {
        Route::post('/', [Controllers\ChatController::class, 'store'])->name('chat.store');
        Route::post('{room}', [Controllers\Chat\RoomController::class, 'store'])->name('room.store');
    });
});

/**
 * Admin routes
 */
Route::middleware(['auth', DashboardMiddleware::class])->group(function () {
    Route::get('dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard/user', [Controllers\Dashboard\UserController::class, 'index'])->name('dashboard.user.index');
    Route::get('dashboard/user/{user}/activate', [Controllers\Dashboard\UserController::class, 'activate'])->name('dashboard.user.activate');
    Route::post('dashboard/user/{user}', [Controllers\Dashboard\UserController::class, 'update'])->name('dashboard.user.update');
    Route::delete('dashboard/user/{user}/ban-forum', [Controllers\Dashboard\UserController::class, 'banForum'])->name('dashboard.user.ban_forum');
    Route::delete('dashboard/user/{user}/ban-chat', [Controllers\Dashboard\UserController::class, 'banChat'])->name('dashboard.user.ban_chat');
    Route::delete('dashboard/user/{user}/archived', [Controllers\Dashboard\UserController::class, 'ban'])->name('dashboard.user.archived');
    Route::get('dashboard/forum', [Controllers\Dashboard\ForumController::class, 'index'])->name('dashboard.forum.index');
    Route::get('dashboard/forum/{category}', [Controllers\Dashboard\ForumController::class, 'show'])->name('dashboard.forum.show');
    Route::post('dashboard/forum', [Controllers\Dashboard\ForumController::class, 'store'])->name('dashboard.forum.store');
    Route::patch('dashboard/forum/{category}', [Controllers\Dashboard\ForumController::class, 'update'])->name('dashboard.forum.update');
    Route::delete('dashboard/forum/{category}', [Controllers\Dashboard\ForumController::class, 'delete'])->name('dashboard.forum.delete');

    Route::post('dashboard/sub-category', [Controllers\Forums\SubCategoryController::class, 'store'])->name('dashboard.sub_category.store');
    Route::patch('dashboard/sub-category/{sub_category}', [Controllers\Forums\SubCategoryController::class, 'update'])->name('dashboard.sub_category.update');
    Route::delete('dashboard/sub-category/{sub_category}', [Controllers\Forums\SubCategoryController::class, 'delete'])->name('dashboard.sub_category.delete');
});
