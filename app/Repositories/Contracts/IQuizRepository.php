<?php

namespace App\Repositories\Contracts;

interface IQuizRepository
{
    /**
     * @return array
     */
    public function getRandomQuestion(): array;
    /**
     * @param int $id
     * @return array|null
     */
    public function getQuestionById(int $id): ?array;

    /**
     * @param int $questionId
     * @param string $answer
     * @return bool
     */
    public function checkAnswer(int $questionId, string $answer): bool;
}
