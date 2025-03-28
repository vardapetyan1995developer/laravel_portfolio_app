<?php

namespace App\Providers;

use App\Repositories\Contracts\IQuizRepository;
use App\Repositories\QuizRepository;
use App\Services\Contracts\IQuizService;
use App\Services\QuizService;
use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IQuizRepository::class, QuizRepository::class);
        $this->app->bind(IQuizService::class, QuizService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
