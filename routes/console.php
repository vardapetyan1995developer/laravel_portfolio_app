<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('tester', function () {
    $bot = \DefStudio\Telegraph\Models\TelegraphBot::query()->find(1);

    dd($bot->registerCommands([
        'hello' => 'Says hello',
        'actions' => 'Different actions',
        'help' => 'What can this bot?',
    ])->send());
});
