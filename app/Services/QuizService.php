<?php

namespace App\Services;

use App\Models\QuizSession;
use App\Repositories\Contracts\IQuizRepository;
use App\Services\Contracts\IQuizService;
use App\Services\Contracts\ITelegramService;

class QuizService implements IQuizService
{
    private IQuizRepository $quizRepository;
    private ITelegramService $telegramService;

    /**
     * @param IQuizRepository $quizRepository
     * @param ITelegramService $telegramService
     */
    public function __construct(IQuizRepository $quizRepository, ITelegramService $telegramService)
    {
        $this->quizRepository = $quizRepository;
        $this->telegramService = $telegramService;
    }

    /**
     * @param int $chatId
     * @return void
     */
    public function startQuiz(int $chatId): void
    {
        $question = $this->quizRepository->getRandomQuestion();
        $questionId = array_search($question, $this->quizRepository->questions);

        QuizSession::query()->updateOrCreate(
            ['chat_id' => $chatId],
            ['question_id' => $questionId]
        );

        $message = "Quiz Time! 🤔\n" . $question['question'] . "\n\nReply with your answer.";
        $this->telegramService->sendMessage($chatId, $message);
    }

    /**
     * @param int $chatId
     * @param int $questionId
     * @param string $answer
     * @return void
     */
    public function checkQuizAnswer(int $chatId, int $questionId, string $answer): void
    {
        $isCorrect = $this->quizRepository->checkAnswer($questionId, $answer);
        $response = $isCorrect ? "✅ Correct! Well done." : "❌ Incorrect. Try again!";

        $this->telegramService->sendMessage($chatId, $response);
    }
}
