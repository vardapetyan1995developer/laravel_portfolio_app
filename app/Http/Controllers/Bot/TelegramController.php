<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Services\Contracts\IDashboardTelegramService;
use Illuminate\Contracts\Support\Renderable;

class TelegramController extends Controller
{
    protected IDashboardTelegramService $dashboardTelegramService;

    /**
     * @param IDashboardTelegramService $dashboardTelegramService
     */
    public function __construct(IDashboardTelegramService $dashboardTelegramService)
    {
        $this->dashboardTelegramService = $dashboardTelegramService;
    }

    /**
     * @return Renderable
     */
    public function showTelegraphBots(): Renderable
    {
        $telegraphBots = $this->dashboardTelegramService->getAllTelegraphBots();

        return view('dashboard.telegram.telegraph-bots', [
            'telegraphBots' => $telegraphBots,
        ]);
    }

    /**
     * @return Renderable
     */
    public function showTelegraphChats(): Renderable
    {
        $telegraphChats = $this->dashboardTelegramService->getAllTelegraphChats();

        return view('dashboard.telegram.telegraph-chats', [
            'telegraphChats' => $telegraphChats,
        ]);
    }
}
