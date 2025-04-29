<?php

return [
    'app' => [
        'name' => env('APP_NAME', 'ArmDevStack'),
        'env' => env('APP_ENV', 'local'),
        'key' => env('APP_KEY'),
        'debug' => (bool) env('APP_DEBUG', true),
        'timezone' => env('APP_TIMEZONE', 'Asia/Yerevan'),
        'url' => env('APP_URL', 'http://localhost:8000'),
        'locale' => env('APP_LOCALE', 'en'),
        'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
        'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
        'maintenance' => [
            'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
            'store' => env('APP_MAINTENANCE_STORE', 'database'),
        ],
    ],

    'php' => [
        'cli_server_workers' => (int) env('PHP_CLI_SERVER_WORKERS', 4),
    ],

    'hashing' => [
        'bcrypt_rounds' => (int) env('BCRYPT_ROUNDS', 12),
    ],

    'logging' => [
        'channel' => env('LOG_CHANNEL', 'stack'),
        'stack' => env('LOG_STACK', 'single'),
        'deprecations_channel' => env('LOG_DEPRECATIONS_CHANNEL'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'database' => [
        'default' => env('DB_CONNECTION', 'mysql'),
        'connections' => [
            'mysql' => [
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', '001_telegram_bot'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', 'root'),
            ],
        ],
    ],

    'session' => [
        'driver' => env('SESSION_DRIVER', 'database'),
        'lifetime' => (int) env('SESSION_LIFETIME', 120),
        'encrypt' => (bool) env('SESSION_ENCRYPT', false),
        'path' => env('SESSION_PATH', '/'),
        'domain' => env('SESSION_DOMAIN'),
    ],

    'broadcasting' => [
        'default' => env('BROADCAST_CONNECTION', 'log'),
    ],

    'filesystems' => [
        'default' => env('FILESYSTEM_DISK', 'local'),
    ],

    'queue' => [
        'default' => env('QUEUE_CONNECTION', 'database'),
    ],

    'cache' => [
        'default' => env('CACHE_STORE', 'database'),
        'prefix' => env('CACHE_PREFIX'),
        'stores' => [
            'memcached' => [
                'host' => env('MEMCACHED_HOST', '127.0.0.1'),
            ],
        ],
    ],

    'redis' => [
        'client' => env('REDIS_CLIENT', 'phpredis'),
        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD'),
            'port' => (int) env('REDIS_PORT', 6379),
        ],
    ],

    'mail' => [
        'default' => env('MAIL_MAILER', 'log'),
        'scheme' => env('MAIL_SCHEME'),
        'host' => env('MAIL_HOST', '127.0.0.1'),
        'port' => (int) env('MAIL_PORT', 2525),
        'username' => env('MAIL_USERNAME'),
        'password' => env('MAIL_PASSWORD'),
        'from' => [
            'address' => env('MAIL_FROM_ADDRESS', 'armdevstack@example.com'),
            'name' => env('MAIL_FROM_NAME', env('APP_NAME', 'ArmDevStack')),
        ],
    ],

    'aws' => [
        'access_key_id' => env('AWS_ACCESS_KEY_ID'),
        'secret_access_key' => env('AWS_SECRET_ACCESS_KEY'),
        'default_region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
        'bucket' => env('AWS_BUCKET'),
        'use_path_style_endpoint' => (bool) env('AWS_USE_PATH_STYLE_ENDPOINT', false),
    ],

    'vite' => [
        'app_name' => env('VITE_APP_NAME', env('APP_NAME', 'ArmDevStack')),
    ],

    'telegram' => [
        'bot_token' => env('TELEGRAM_BOT_TOKEN'),
        'ngrok_url' => env('NGROK_URL'),
    ],

    'pusher' => [
        'app_id' => env('PUSHER_APP_ID'),
        'app_key' => env('PUSHER_APP_KEY'),
        'app_secret' => env('PUSHER_APP_SECRET'),
        'host' => env('PUSHER_HOST'),
        'port' => (int) env('PUSHER_PORT', 443),
        'scheme' => env('PUSHER_SCHEME', 'https'),
        'cluster' => env('PUSHER_APP_CLUSTER', 'mt1'),
    ],

    'ai' => [
        'service' => env('AI_SERVICE', 'chatgpt'),
        'openai' => [
            'api_key' => env('OPENAI_API_KEY'),
        ],
    ],
];
