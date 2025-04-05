<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Telegram\StoreTelegraphBotRequest;
use App\Http\Requests\Telegram\UpdateTelegraphBotRequest;
use App\Services\Contracts\IDashboardTelegramService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

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

    /**
     * @return Renderable
     */
    public function createTelegraphBot(): Renderable
    {
        return view('dashboard.telegram.telegraph-bots-create');
    }

    /**
     * @param StoreTelegraphBotRequest $request
     * @return RedirectResponse
     */
    public function storeTelegraphBot(StoreTelegraphBotRequest $request): RedirectResponse
    {
        $this->dashboardTelegramService->createTelegraphBot($request->validated());

        return redirect()->route('telegram.telegraph-bots')->with('success', 'Created successfully');
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function editTelegraphBot(int $id): Renderable
    {
        $telegraphBot = $this->dashboardTelegramService->getTelegraphBotById($id);

        return view('dashboard.telegram.telegraph-bots-edit', [
            'telegraphBot' => $telegraphBot,
        ]);
    }

    /**
     * @param UpdateTelegraphBotRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function updateTelegraphBot(UpdateTelegraphBotRequest $request, int $id): RedirectResponse
    {
        $updatedTelegraphBot = $this->dashboardTelegramService->updateTelegraphBot($id, $request->validated());

        return redirect()
            ->route('telegram.telegraph-bots')
            ->with('success', "Bot $updatedTelegraphBot->name updated successfully");
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function deleteTelegraphBot(int $id): RedirectResponse
    {
        $this->dashboardTelegramService->deleteTelegraphBot($id);

        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
