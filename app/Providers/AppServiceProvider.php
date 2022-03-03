<?php

namespace App\Providers;

use App\Models\WebInfo;
use Illuminate\Support\ServiceProvider;

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
        $webInfo = WebInfo::first();
        if($webInfo){
            view()->share('webInfo', $webInfo);
        }
    }
}
