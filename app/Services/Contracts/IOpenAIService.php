<?php

namespace App\Services\Contracts;

interface IOpenAIService
{
    /**
     * @param string $message
     * @return string
     */
    public function ask(string $message): string;
}
