<?php

namespace App\Services\Contracts;

interface IQuizService
{
    /**
     * @param int $chatId
     * @return void
     */
    public function startQuiz(int $chatId): void;

    /**
     * @param int $chatId
     * @param int $questionId
     * @param string $answer
     * @return void
     */
    public function checkQuizAnswer(int $chatId, int $questionId, string $answer): void;
}
