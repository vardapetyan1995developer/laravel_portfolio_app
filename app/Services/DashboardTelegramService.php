<?php

namespace App\Services;

use App\Repositories\Contracts\IDashboardTelegramRepository;
use App\Services\Contracts\IDashboardTelegramService;
use Illuminate\Database\Eloquent\Collection;

class DashboardTelegramService implements IDashboardTelegramService
{
    protected IDashboardTelegramRepository $dashboardTelegramRepository;

    /**
     * @param IDashboardTelegramRepository $dashboardTelegramRepository
     */
    public function __construct(IDashboardTelegramRepository $dashboardTelegramRepository)
    {
        $this->dashboardTelegramRepository = $dashboardTelegramRepository;
    }

    /**
     * @return array|Collection
     */
    public function getAllTelegraphBots(): array|Collection
    {
        return $this->dashboardTelegramRepository->getAllTelegraphBots();
    }
}
