<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/17
 * Time: 1:50
 */

namespace websocketsp;
use GuzzleHttp\Client;


class MsgClient
{
    private $host = "";
    private $client = null;
    public function  __construct($host)
    {
        $this->host = $host;
    }

    private function Client()
    {
        if($this->client == null)$this->client =  new Client([
            // Base URI is used with relative requests
            'base_uri' =>$this->host,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        return $this->client;
    }

    public function search($conds = [])
    {
        $response = $this->Client()->request("GET",'', [
            'query' => $conds
        ]);

        $code = $response->getStatusCode();
        $body = $response->getBody();

        return  [
            'code' => $code ,
            'body' => json_decode($body,true),
        ];
    }

    public function get($message_id,$city_id)
    {
        return $this->request($message_id,$city_id);
    }


    public function read($message_id,$city_id)
    {
        return $this->request($message_id,$city_id, 'PUT');
    }

    public function delete($message_id,$city_id)
    {
        return $this->request($message_id,$city_id, 'DELETE');
    }


    public function request($message_id,$city_id,$method = 'GET')
    {
        $response = $this->Client()->request($method, $message_id, [
            'query' => ['city_id' => $city_id]
        ]);
        $code = $response->getStatusCode();
        $body = $response->getBody();

        return  [
            'code' => $code ,
            'body' => json_decode($body,true),
        ];
    }
}