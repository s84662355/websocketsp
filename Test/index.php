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

$extra = [

    'src_type'=>1,
    'src_id'  => '819wewew128cjhiuhw',
    'dest_type'=>2,
    'dest_id'=> 'sdjo32423432423o',
    'src_name' => '一一培训',
    'src_type_name' => '机构',
    'dest_name' => '中心小学',
    'dest_type_name' => '学校11',
];


for ($i=0;$i<10;$i++)
$Client->publish("hello world",$extra);