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
}
