<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-06-10
 * Time: 18:10
 */


require('../vendor/autoload.php');

use websocketsp\PubClient;


$config = include '../config/websocketsp.php';

var_dump($config);

$uri = "ws://{$config['host']}:{$config['port']}";

$Client = new PubClient($uri,$config['options']);

$Client->auth($config['password']);

$data = [
    'ajsdks',
    'adjio对我 i 哦大家'
];

$Client->publish(json_encode($data),"111111",1,"skvmdlvmdkflvd",3,"111111");