<?php

namespace App\Providers;

use App\Services\Contracts\IOpenAIService;
use App\Services\OpenAIService;
use Illuminate\Support\ServiceProvider;

class OpenAIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IOpenAIService::class, OpenAIService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
