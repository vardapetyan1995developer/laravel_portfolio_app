<?php

namespace App\Providers;

use App\Repositories\Contracts\Settings\ISettingsRepository;
use App\Repositories\Settings\SettingsRepository;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ISettingsRepository::class, SettingsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
