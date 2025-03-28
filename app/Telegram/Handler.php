<?php

namespace App\Telegram;

use App\Models\QuizSession;
use App\Services\Contracts\IAIService;
use App\Services\Contracts\IQuizService;
use Exception;
use App\Services\Contracts\ITelegramService;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    private ITelegramService $telegramService;
    private IAIService $aiService;
    private IQuizService $quizService;

    /**
     * @param ITelegramService $telegramService
     * @param IAIService $aiService
     * @param IQuizService $quizService
     */
    public function __construct(ITelegramService $telegramService, IAIService $aiService, IQuizService $quizService)
    {
        $this->telegramService = $telegramService;
        $this->aiService = $aiService;
        $this->quizService = $quizService;
    }

    /**
     * @return void
     */
    public function quiz(): void
    {
        $this->quizService->startQuiz($this->chat->id);
    }

    /**
     * @param string $name
     * @return void
     */
    public function hello(string $name): void
    {
        $this->telegramService->sendMessage($this->chat->id, "Hello $name");
    }

    /**
     * @return void
     */
    public function help(): void
    {
        $this->telegramService->sendHelpMessage($this->chat->id);
    }

    /**
     * @return void
     */
    public function like(): void
    {
        try
        {
            $this->telegramService->sendMessage($this->chat->id, 'Thank you for like😊');
        }
        catch (Exception $e)
        {
            Log::error('Error sending Telegram message: ' . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function subscribe(): void
    {
        $channelName = $this->data->get('channel_name') ?? 'unknown channel';
        $this->telegramService->sendMessage($this->chat->id, "Thank you for subscribing to $channelName");
    }

    /**
     * @return void
     */
    public function actions(): void
    {
        try
        {
            $this->telegramService->sendActionsKeyboard($this->chat->id);
        }
        catch (Exception $e)
        {
            Log::error('Telegram API Error: ' . $e->getMessage());
        }
    }

    /**
     * @param Stringable $text
     * @return void
     */
    protected function handleUnknownCommand(Stringable $text): void
    {
        $response = ($text->value() === '/start')
            ? "Welcome back😊😊😊"
            : "Unknown command🙁🙁🙁";

        $this->telegramService->sendMessage($this->chat->id, $response);
    }

    /**
     * Handle chat message for quiz
     *
     * @param Stringable $text
     * @return void
     */
    protected function handleChatMessage(Stringable $text): void
    {
        $chatId = $this->chat->id;
        $quizSession = QuizSession::query()->where('chat_id', $chatId)->first();

        if ($quizSession)
        {
            $this->quizService->checkQuizAnswer($chatId, $quizSession->question_id, $text->value());
            $quizSession->delete();
        }
        else
        {
            $this->telegramService->sendMessage($chatId, 'Please start the quiz first using /quiz.');
        }
    }

    /**
     * Handle chat message for ai
     *
     * @param Stringable $text
     * @return void
     */
    /*protected function handleChatMessage(Stringable $text): void
    {
        $response = $this->aiService->ask($text->value());
        $this->reply($response);
    }*/
}
