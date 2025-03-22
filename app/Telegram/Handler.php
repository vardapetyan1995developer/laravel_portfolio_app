<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    /**
     * @param string $name
     * @return void
     */
    public function hello(string $name): void
    {
        $this->reply("Hello $name");
    }

    /**
     * @return void
     */
    public function help(): void
    {
        $this->reply("*Hello!* For now i can only speak.😊");
    }

    /**
     * @return void
     */
    public function like(): void
    {
        Telegraph::message('Thank you for like😊')->send();
    }

    /**
     * @return void
     */
    public function subscribe(): void
    {
        $this->reply('Thank you for subscription to ' . $this->data->get('channel_name'));
    }

    /**
     * @return void
     */
    public function actions(): void
    {
        Telegraph::message('Choose some action')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Go to website')->url('https://it.zeepup.com'),
                Button::make('Like')->action('like'),
                Button::make('Subscribe')->action('subscribe')
                    ->param('channel_name', '@armdevstack'),
            ]))->send();
    }

    /**
     * @param Stringable $text
     * @return void
     */
    protected function handleUnknownCommand(Stringable $text): void
    {
        if ($text->value() === '/start')
        {
            $this->reply("Welcome back😊😊😊");
        }
        else
        {
            $this->reply('Unknown command🙁🙁🙁');
        }
    }

    /**
     * @param Stringable $text
     * @return void
     */
    protected function handleChatMessage(Stringable $text): void
    {
        //$this->reply($text);
        $this->reply(false);
    }
}
