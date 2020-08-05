<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TelegramBotClientFacade
 *
 * @author lrava 
 */
namespace Rider\Telegrambot\Facade;


use Illuminate\Support\Facades\Facade;

class TelegramBotClientFacade extends Facade {
   
    protected static function getFacadeAccessor() { return 'telegrambot_client'; }
    
}
