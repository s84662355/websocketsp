# websocketsp
composer require chenjiahao/websocketsp


    'providers' => [
         websocketsp\WebSocketSPServiceProvider::class
   
      ............

    ],
    
    
    
    
    php artisan vendor:publish  
    
    配置
    
    return [
    'host' => '47.112.128.19' ,
    'port' => '8083',
    'password' => '123456',
    'options' => [],
    ];
    
    
    $Client=app('websocketsp');
    
    
$extra = [

    'src_type'=>1,
    'src_id'  => '819wewew128cjhiuhw',
    'dest_type'=>2,
    'dest_id'=> 'sdjo32423432423o',
    'src_name' => '一一培训',
    'src_type_name' => '机构',
    'dest_name' => '中心小学',
    'dest_type_name' => '学校11',
    'city_id' => '440100000000',
   /// 'city_id' => '440300000000',
];


for ($i=0;$i<10;$i++)
$Client->publish("hello world",$extra);

