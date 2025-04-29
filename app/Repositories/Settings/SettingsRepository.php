<?php

namespace App\Repositories\Settings;

use App\Models\Setting;
use App\Repositories\Contracts\Settings\ISettingsRepository;

class SettingsRepository implements ISettingsRepository
{
    /**
     * @param string $key
     * @return string|null
     */
    public function getByKey(string $key): ?string
    {
        $setting = Setting::query()->where('key', $key)->first();

        return $setting ? $setting->value : null;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return Setting::all()->pluck('value', 'key')->toArray();
    }
}
