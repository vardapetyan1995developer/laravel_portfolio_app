<?php

namespace App\Services\Contracts;

interface IAIService
{
    /**
     * @param string $message
     * @return string
     */
    public function ask(string $message): string;
}
