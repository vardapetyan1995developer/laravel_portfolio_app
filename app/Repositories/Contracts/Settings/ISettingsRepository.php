<?php

namespace App\Repositories\Contracts\Settings;

interface ISettingsRepository
{
    /**
     * @param string $key
     * @return string|null
     */
    public function getByKey(string $key): ?string;

    /**
     * @return array
     */
    public function getAll(): array;
}
