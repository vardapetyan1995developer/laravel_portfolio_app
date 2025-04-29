<?php

namespace App\Services\Settings;

use App\Repositories\Contracts\Settings\ISettingsRepository;

readonly class SettingsService
{
    protected ISettingsRepository $settingsRepository;

    /**
     * @param ISettingsRepository $settingsRepository
     */
    public function __construct(ISettingsRepository $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->settingsRepository->getByKey($key) ?? $default;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->settingsRepository->getAll();
    }
}
