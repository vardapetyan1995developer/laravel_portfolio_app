<?php

namespace App\Providers;

use App\Services\Contracts\IMessageHandlerService;
use App\Services\Contracts\ITelegramService;
use App\Services\MessageHandlerService;
use App\Services\TelegramService;
use Illuminate\Support\ServiceProvider;

class TelegramServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ITelegramService::class, TelegramService::class);
        $this->app->bind(IMessageHandlerService::class, MessageHandlerService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
