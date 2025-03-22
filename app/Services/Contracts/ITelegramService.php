<?php

namespace App\Services\Contracts;

interface ITelegramService
{
    public function sendMessage(int $chatId, string $text): void;
}
