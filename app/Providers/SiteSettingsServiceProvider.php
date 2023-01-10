<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\LivinServices\SiteSettingsFacade;
class SiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('SiteSettings',function(){
            return new SiteSettingsFacade();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('SiteSettings',function(){
            return new SiteSettingsFacade();
        });
    }
}
