<?php

namespace App\Repositories;

use App\Models\TelegraphBot;
use App\Models\TelegraphChat;
use App\Repositories\Contracts\IDashboardTelegramRepository;
use Illuminate\Database\Eloquent\Collection;

class DashboardTelegramRepository implements IDashboardTelegramRepository
{
    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection
    {
        return TelegraphBot::query()->get();
    }

    /**
     * @return array|Collection
     */
    public function getAllTelegraphChats(): array|Collection
    {
        return TelegraphChat::query()->get();
    }

    /**
     * @param array $data
     * @return void
     */
    public function createTelegraphBot(array $data): void
    {
        TelegraphBot::query()->create($data);
    }

    /**
     * @param int $id
     * @return TelegraphBot
     */
    public function getTelegraphBotById(int $id): TelegraphBot
    {
        return TelegraphBot::query()->where('id', $id)->first();
    }

    /**
     * @param int $id
     * @param array $data
     * @return TelegraphBot
     */
    public function updateTelegraphBot(int $id, array $data): TelegraphBot
    {
        $telegraphBot = $this->getTelegraphBotById($id);
        $telegraphBot->update($data);

        return $telegraphBot;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteTelegraphBot(int $id): void
    {
        $telegraphBot = TelegraphBot::query()->findOrFail($id);
        $telegraphBot->delete();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteTelegraphChat(int $id): void
    {
        $telegraphChat = TelegraphChat::query()->findOrFail($id);
        $telegraphChat->delete();
    }
}
