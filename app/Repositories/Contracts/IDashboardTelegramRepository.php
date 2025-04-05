<?php

namespace App\Repositories\Contracts;

use App\Models\TelegraphBot;
use Illuminate\Database\Eloquent\Collection;

interface IDashboardTelegramRepository
{
    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection;
    /**
     * @param int $id
     * @return TelegraphBot
     */
    public function getTelegraphBotById(int $id): TelegraphBot;
    /**
     * @return array|Collection
     */
    public function getAllTelegraphChats(): array|Collection;
    /**
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
    /**
     * @param int $id
     * @return mixed
     */
    public function deleteTelegraphChat(int $id);
}
