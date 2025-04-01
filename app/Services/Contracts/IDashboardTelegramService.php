<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IDashboardTelegramService
{
    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection;
}
