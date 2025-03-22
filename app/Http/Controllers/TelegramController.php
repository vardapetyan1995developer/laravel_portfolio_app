<?php

namespace App\Http\Controllers;

use App\Services\Contracts\IMessageHandlerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    private IMessageHandlerService $messageHandler;

    /**
     * @param IMessageHandlerService $messageHandler
     */
    public function __construct(IMessageHandlerService $messageHandler)
    {
        $this->messageHandler = $messageHandler;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function webhook(Request $request): JsonResponse
    {
        $data = $request->all();
        $this->messageHandler->handle($data);

        return response()->json(['status' => 'ok']);
    }
}
