<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'APP_NAME' => env('APP_NAME'),
            'APP_ENV' => env('APP_ENV'),
            'APP_KEY' => env('APP_KEY'),
            'APP_DEBUG' => env('APP_DEBUG'),
            'APP_TIMEZONE' => env('APP_TIMEZONE'),
            'APP_URL' => env('APP_URL'),

            'APP_LOCALE' => env('APP_LOCALE'),
            'APP_FALLBACK_LOCALE' => env('APP_FALLBACK_LOCALE'),
            'APP_FAKER_LOCALE' => env('APP_FAKER_LOCALE'),

            'APP_MAINTENANCE_DRIVER' => env('APP_MAINTENANCE_DRIVER'),
            // 'APP_MAINTENANCE_STORE' => env('APP_MAINTENANCE_STORE'),

            'PHP_CLI_SERVER_WORKERS' => env('PHP_CLI_SERVER_WORKERS'),

            'BCRYPT_ROUNDS' => env('BCRYPT_ROUNDS'),

            'LOG_CHANNEL' => env('LOG_CHANNEL'),
            'LOG_STACK' => env('LOG_STACK'),
            'LOG_DEPRECATIONS_CHANNEL' => env('LOG_DEPRECATIONS_CHANNEL'),
            'LOG_LEVEL' => env('LOG_LEVEL'),

            'DB_CONNECTION' => env('DB_CONNECTION'),
            'DB_HOST' => env('DB_HOST'),
            'DB_PORT' => env('DB_PORT'),
            'DB_DATABASE' => env('DB_DATABASE'),
            'DB_USERNAME' => env('DB_USERNAME'),
            'DB_PASSWORD' => env('DB_PASSWORD'),

            'SESSION_DRIVER' => env('SESSION_DRIVER'),
            'SESSION_LIFETIME' => env('SESSION_LIFETIME'),
            'SESSION_ENCRYPT' => env('SESSION_ENCRYPT'),
            'SESSION_PATH' => env('SESSION_PATH'),
            'SESSION_DOMAIN' => env('SESSION_DOMAIN'),

            'BROADCAST_CONNECTION' => env('BROADCAST_CONNECTION'),
            'FILESYSTEM_DISK' => env('FILESYSTEM_DISK'),
            'QUEUE_CONNECTION' => env('QUEUE_CONNECTION'),

            'CACHE_STORE' => env('CACHE_STORE'),
            // 'CACHE_PREFIX' => env('CACHE_PREFIX'),

            'MEMCACHED_HOST' => env('MEMCACHED_HOST'),

            'REDIS_CLIENT' => env('REDIS_CLIENT'),
            'REDIS_HOST' => env('REDIS_HOST'),
            'REDIS_PASSWORD' => env('REDIS_PASSWORD'),
            'REDIS_PORT' => env('REDIS_PORT'),

            'MAIL_MAILER' => env('MAIL_MAILER'),
            'MAIL_SCHEME' => env('MAIL_SCHEME'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),

            'AWS_ACCESS_KEY_ID' => env('AWS_ACCESS_KEY_ID'),
            'AWS_SECRET_ACCESS_KEY' => env('AWS_SECRET_ACCESS_KEY'),
            'AWS_DEFAULT_REGION' => env('AWS_DEFAULT_REGION'),
            'AWS_BUCKET' => env('AWS_BUCKET'),
            'AWS_USE_PATH_STYLE_ENDPOINT' => env('AWS_USE_PATH_STYLE_ENDPOINT'),

            'VITE_APP_NAME' => env('VITE_APP_NAME'),

            'TELEGRAM_BOT_TOKEN' => env('TELEGRAM_BOT_TOKEN'),
            'NGROK_URL' => env('NGROK_URL'),

            'PUSHER_APP_ID' => env('PUSHER_APP_ID'),
            'PUSHER_APP_KEY' => env('PUSHER_APP_KEY'),
            'PUSHER_APP_SECRET' => env('PUSHER_APP_SECRET'),
            //'PUSHER_HOST' => env('PUSHER_HOST'),
            //'PUSHER_PORT' => env('PUSHER_PORT'),
            //'PUSHER_SCHEME' => env('PUSHER_SCHEME'),
            'PUSHER_APP_CLUSTER' => env('PUSHER_APP_CLUSTER'),

            'AI_SERVICE' => env('AI_SERVICE'),
            'OPENAI_API_KEY' => env('OPENAI_API_KEY')
        ];

        foreach ($settings as $key => $value)
        {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
    }
}
