<?php

namespace App\Repositories;

use App\Models\TelegraphBot;
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
}
