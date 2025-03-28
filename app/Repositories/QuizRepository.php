<?php

namespace App\Repositories;

use App\Repositories\Contracts\IQuizRepository;

class QuizRepository implements IQuizRepository
{
    public array $questions = [
        1 => ['question' => 'What is the capital of France?', 'answer' => 'Paris'],
        2 => ['question' => 'What is 2 + 2?', 'answer' => '4'],
        3 => ['question' => 'Who wrote Hamlet?', 'answer' => 'Shakespeare'],
    ];

    /**
     * @return string[]
     */
    public function getRandomQuestion(): array
    {
        return $this->questions[array_rand($this->questions)];
    }

    /**
     * @param int $id
     * @return string[]|null
     */
    public function getQuestionById(int $id): ?array
    {
        return $this->questions[$id] ?? null;
    }

    /**
     * @param int $questionId
     * @param string $answer
     * @return bool
     */
    public function checkAnswer(int $questionId, string $answer): bool
    {
        return isset($this->questions[$questionId]) &&
            strtolower(trim($this->questions[$questionId]['answer'])) === strtolower(trim($answer));
    }
}
