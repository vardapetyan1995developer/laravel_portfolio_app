<?php

namespace App\Http\Middleware;

use App\Services\Settings\SettingsService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoadSettings
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $settings = app(SettingsService::class)->all();

        foreach ($settings as $key => $value)
        {
            if (!is_null($value))
            {
                $configKey = str_replace('.', '_', $key);

                $envValue = env(strtoupper($configKey));

                if (is_null($envValue) || $this->shouldOverrideEnv())
                {
                    config([$configKey => $value]);
                }
            }
        }

        return $next($request);
    }

    /**
     * @return bool
     */
    protected function shouldOverrideEnv(): bool
    {
        return config('app.override_env_settings', false);
    }
}
