<?php

namespace App\LivinServices;

use App\Models\WebSettings;
use Illuminate\Support\Facades\Facade;

class SiteSettingsFacade extends Facade
{
    public static function title(){

        $web_title = WebSettings::where('setting_name','title')->pluck('setting_value')->first();
        return $web_title;

    }
    public static function ad(){

        $ad = WebSettings::where('setting_name','banner_ad')->pluck('setting_value')->first();
        return $ad;

    }

    public static function adminEmail(){
        $ad = WebSettings::where('setting_name','admin_email')->pluck('setting_value')->first();
        return $ad;
    }
    public static function description(){
        $ad = WebSettings::where('setting_name','description')->pluck('setting_value')->first();
        return $ad;
    }
    public static function banner_ad(){
        $ad = WebSettings::where('setting_name','banner_ad')->pluck('setting_value')->first();
        return $ad;
    }
    public static function contact(){
        $ad = WebSettings::where('setting_name','contact')->pluck('setting_value')->first();
        return $ad;
    }

    public static function webUrl(){
        $ad = WebSettings::where('setting_name','web_url')->pluck('setting_value')->first();
        return $ad;
    }

    protected static function getFacadeAccessor()
    {
        return 'SiteSettings';
    }
}
