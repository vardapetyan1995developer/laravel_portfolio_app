<?php

namespace App\Services;

use App\Models\TelegraphBot;
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

    /**
     * @return array|Collection
     */
    public function getAllTelegraphChats(): array|Collection
    {
        return $this->dashboardTelegramRepository->getAllTelegraphChats();
    }

    /**
     * @param int $id
     * @return TelegraphBot
     */
    public function getTelegraphBotById(int $id): TelegraphBot
    {
        return $this->dashboardTelegramRepository->getTelegraphBotById($id);
    }

    /**
     * @param array $data
     * @return void
     */
    public function createTelegraphBot(array $data): void
    {
        $this->dashboardTelegramRepository->createTelegraphBot($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return TelegraphBot
     */
    public function updateTelegraphBot(int $id, array $data): TelegraphBot
    {
        return $this->dashboardTelegramRepository->updateTelegraphBot($id, $data);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteTelegraphBot(int $id): void
    {
        $this->dashboardTelegramRepository->deleteTelegraphBot($id);
    }
}
