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
        $body->id_cache = $idBot;

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
        
        $body->id_cache = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/start', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  

        
        
    }

    public function stopBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_cache = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/stop', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function setBot($idBot,$token_face,$instagram_id,$first_message,$last_message,$num_tags){
        
        $body = new \stdClass();
        
        $body->id_cache = $idBot;
        $body->token_face = $token_face;
        $body->instagram_id = $instagram_id;
        $body->first_message = $first_message;
        $body->last_message = $last_message; 
        $body->num_tags = $num_tags;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/bot/set', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function deleteCommentsBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_cache = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('DELETE', '/bot/comments/id', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

    public function deleteUsersBot($idBot){
        
        $body = new \stdClass();
        
        $body->id_cache = $idBot;
        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('DELETE', '/bot/user/idbot', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();  
       
    }

 
}

