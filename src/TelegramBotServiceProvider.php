<?php

namespace Rider\Telegrambot;

use Illuminate\Support\ServiceProvider;

class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/telegrambot.php' => config_path('telegrambot.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
       
        $this->app->bind('telegrambot_client',function() { 
            return new \Rider\Telegrambot\TelegramBotClient(config('telegrambot.server'),config('telegrambot.timeout'));
        });
        
    }
}
