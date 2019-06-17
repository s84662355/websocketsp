<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-06-10
 * Time: 18:10
 */


require('../vendor/autoload.php');

use websocketsp\PubClient;
use websocketsp\MsgClient;


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
    'level' => 3,
    'type'  => 2,
    'city_id' => '440100000000',
   /// 'city_id' => '440300000000',
];


for ($i=0;$i<10;$i++)
//var_dump($Client->publish("hello world",$extra))  ;



$c = new MsgClient($config["web_host"]);


/*
 *
array(2) {
    ["code"]=>
  int(200)
  ["body"]=>
  array(2) {
        ["status"]=>
    string(7) "success"
        ["data"]=>
    string(9) "成功！"
  }
}
 * */
var_dump($c->read("aa4cd53298494094947bf5bb1add29e9",'440100000000')) ;
/*
 * array(2) {
    ["code"]=>
  int(200)
  ["body"]=>
  array(20) {
        ["id"]=>
    int(1)
    ["message_id"]=>
    string(32) "aa4cd53298494094947bf5bb1add29e9"
        ["src_type"]=>
    int(1)
    ["src_type_name"]=>
    string(6) "机构"
        ["src_id"]=>
    string(18) "819wewew128cjhiuhw"
        ["src_name"]=>
    string(12) "一一培训"
        ["dest_type"]=>
    int(2)
    ["dest_type_name"]=>
    string(8) "学校11"
        ["dest_id"]=>
    string(16) "sdjo32423432423o"
        ["dest_name"]=>
    string(12) "中心小学"
        ["message"]=>
    string(11) "hello world"
        ["is_read"]=>
    int(0)
    ["level"]=>
    int(3)
    ["type"]=>
    int(2)
    ["sent_at"]=>
    string(19) "2019-06-14 02:23:07"
        ["read_at"]=>
    NULL
    ["is_deleted"]=>
    int(1)
    ["deleted_at"]=>
    string(19) "2019-06-17 10:33:39"
        ["created_at"]=>
    string(19) "2019-06-14 10:23:07"
        ["updated_at"]=>
    string(19) "2019-06-14 17:39:05"
  }
}
 * */
var_dump($c->get("aa4cd53298494094947bf5bb1add29e9",'440100000000')) ;
var_dump($c->delete("aa4cd53298494094947bf5bb1add29e9",'440100000000')) ;

/*
array(2) {
    ["code"]=>
  int(200)
  ["body"]=>
  array(2) {
        ["status"]=>
    string(7) "success"
        ["data"]=>
    string(15) "删除成功！"
  }
}
*/