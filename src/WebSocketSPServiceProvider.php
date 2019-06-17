<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-06-10
 * Time: 19:25
 */

namespace websocketsp;
use Illuminate\Support\ServiceProvider;


class WebSocketSPServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => config_path()], 'websocketsp');
        }


        $this->app->singleton(
            'websocketsp',
            function (){
                $config = config('websocketsp');
                $uri = "ws://{$config['host']}:{$config['port']}";
                $Client = new PubClient($uri,$config['options']);

                if(!empty($config['password']))$Client->auth($config['password']);
            	 
            	 
                return  $Client;
            }
        );

        $this->app->singleton(
            'msg_client',
            function (){
                $config = config('websocketsp');
                return new MsgClient($config["web_host"]);
            }
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}