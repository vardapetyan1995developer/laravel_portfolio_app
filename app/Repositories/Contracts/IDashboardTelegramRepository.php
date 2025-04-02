<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IDashboardTelegramRepository
{
    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection;
    /**
     * @return array|Collection
     */
    public function getAllTelegraphChats(): array|Collection;
}
