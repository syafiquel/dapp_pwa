<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class CryptoWalletServiceProvider extends ServiceProvider

{

        protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot()
    {
        /*$this->app['auth']->provider('crypto_wallet',function($app, array $config)
        {
            return new CryptoWalletUserProvider($app['hash'], $config['model']);
            //$model = $app['config']['auth.model'];
            //return new CryptoWalletUserProvider($app['hash'], $model);
        });*/
        try {
            Auth::provider('crypto_wallet', function($app, array $config) {
                 return new CryptoWalletUserProvider($app['hash'], $config['model']);
            });
        } catch(Exception $e) {
            //
        }

        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
