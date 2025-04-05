<?php

use App\Http\Controllers\Bot\TelegramController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use app\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::prefix('/telegram')->group(function () {
            Route::prefix('/telegraph-bots')->group(function () {
                Route::get('/', [TelegramController::class, 'showTelegraphBots'])->name('telegram.telegraph-bots');
                Route::get('/create', [TelegramController::class, 'createTelegraphBot'])->name('telegram.create-telegraph-bot');
                Route::post('/store', [TelegramController::class, 'storeTelegraphBot'])->name('telegram.store-telegraph-bot');
                Route::get('/{id}/edit', [TelegramController::class, 'editTelegraphBot'])->name('telegram.edit-telegraph-bot');
                Route::patch('/{id}/update', [TelegramController::class, 'updateTelegraphBot'])->name('telegram.update-telegraph-bot');
                Route::delete('/{id}/delete', [TelegramController::class, 'deleteTelegraphBot'])->name('telegram.delete-telegraph-bot');
            });

            Route::prefix('/telegraph-chats')->group(function () {
                Route::get('/', [TelegramController::class, 'showTelegraphChats'])->name('telegram.telegraph-chats');
            });
        });

        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

require __DIR__.'/auth.php';
