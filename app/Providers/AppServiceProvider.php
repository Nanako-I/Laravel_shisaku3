<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
// httpsに書き換えるおまじない
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      URL::forceScheme('https');   
     //デフォルトだとhttpになってしまうのでhttpsに書き換える必要がある  //
    }
}
