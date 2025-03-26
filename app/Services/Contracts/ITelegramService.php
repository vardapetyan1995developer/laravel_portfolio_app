<?php

namespace App\Services\Contracts;

interface ITelegramService
{
    /**
     * @param int $chatId
     * @param string $message
     * @return void
     */
    public function sendMessage(int $chatId, string $message): void;

    /**
     * @param int $chatId
     * @return void
     */
    public function sendHelpMessage(int $chatId): void;

    /**
     * @param int $chatId
     * @return void
     */
    public function sendActionsKeyboard(int $chatId): void;
}
