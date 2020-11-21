<?php

namespace Rider\Telegrambot;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class TelegramBotClient{
    
    
    protected $client;
           
    public function __construct($base_uri, $timeout = 60.0) {    
        
        if(!isset($this->client)){
            $this->client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // You can set any number of default request options.
                'timeout'  => $timeout,
            ]);
        }
    
    }

    public function getInfoBot($idBot){
                  
        $body = new \stdClass();
        
        //Setting Body JSON for Rquest
        $body->id_bot = $idBot;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('GET', '/bot/info', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();
                
    }

    public function getAllInfoBot(){
                  
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('GET', '/bot/info/all', $headers);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();
                
    }
    
    public function startBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/start', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  

        
        
    }

    public function stopBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/stop', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function setBot($idBot,$message,$firstMessage,$secondMessage,$longUrl,$shares,$longUrlOspite,$messagePromo,$switchPromo){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $body->message = $message;
        $body->first_message = $firstMessage;
        $body->second_message = $secondMessage;
        $body->long_url = $longUrl;
        $body->shares = $shares;
        $body->long_url_ospite = $longUrlOspite;
        $body->message_promo = $messagePromo;
        $body->switch_promo = $switchPromo;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/set', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }


    public function setMessageBroadcast($idBot,$message){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $body->message = $message;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/send/message', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function deleteCustomerBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('DELETE', '/bot/customer/id', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function deleteUsersBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_bot = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('DELETE', '/bot/user/id', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

 
}

