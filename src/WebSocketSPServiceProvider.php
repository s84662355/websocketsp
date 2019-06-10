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
                return new PubClient(config('websocketsp'));
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