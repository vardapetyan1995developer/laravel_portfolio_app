<?php

namespace App\Services\Contracts;

interface IMessageHandlerService
{
    public function handle(array $data): void;
}
