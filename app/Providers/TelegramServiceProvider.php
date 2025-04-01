<?php

namespace App\Providers;

use App\Repositories\Contracts\IDashboardTelegramRepository;
use App\Repositories\Contracts\ITelegramRepository;
use App\Repositories\DashboardTelegramRepository;
use App\Repositories\TelegramRepository;
use App\Services\Contracts\IDashboardTelegramService;
use App\Services\Contracts\IMessageHandlerService;
use App\Services\Contracts\ITelegramService;
use App\Services\DashboardTelegramService;
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
        $this->app->bind(ITelegramRepository::class, TelegramRepository::class);
        $this->app->bind(IMessageHandlerService::class, MessageHandlerService::class);
        $this->app->bind(IDashboardTelegramRepository::class, DashboardTelegramRepository::class);
        $this->app->bind(IDashboardTelegramService::class, DashboardTelegramService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
