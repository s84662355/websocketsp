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
    
    
  $data = [
      'ajsdks',
      'adjio对我 i 哦大家'
  ];

  $Client->publish(json_encode($data),"111111",1,"skvmdlvmdkflvd",3,"111111");


