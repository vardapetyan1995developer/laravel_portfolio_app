<?php

namespace App\Providers;

use App\Services\Contracts\IAIService;
use App\Services\OllamaService;
use Illuminate\Support\ServiceProvider;

class OpenAIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $aiService = config('ai.services.' . config('ai.default'));

        $this->app->bind(IAIService::class, $aiService);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
