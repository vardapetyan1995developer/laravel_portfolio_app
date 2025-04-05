<?php

namespace App\Services\Contracts;

use App\Models\TelegraphBot;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

interface IDashboardTelegramService
{
    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection;
    /**
     * @return array|Collection
     */
    public function getAllTelegraphChats(): array|Collection;
    /**
     * @param int $id
     * @return TelegraphBot
     */
    public function getTelegraphBotById(int $id): TelegraphBot;
    /**
     * @param array $data
     * @return mixed
     */
    public function createTelegraphBot(array $data);
    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateTelegraphBot(int $id, array $data);
    /**
     * @param int $id
     * @return mixed
     */
    public function deleteTelegraphBot(int $id);
}
