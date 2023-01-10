<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSettings;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    //
    public function updateSettings(Request $request){

        $contact=  $request->input('contact') ?? null;
        $webtitle = $request->input('title') ?? null;
        $banner_ad = $request->input('banner_ad') ?? null;
        $description = $request->input('description') ?? null;
        $admin_email = $request->input('admin_email') ?? null;
        $url = $request->input('web_url') ?? null;

        $contactSetting = WebSettings::where('setting_name','contact')->first();
        $titlesetting = WebSettings::where('setting_name','title')->first();
        $adcode = WebSettings::where('setting_name','banner_ad')->first();
        $dbdescription = WebSettings::where('setting_name','description')->first();
        $dbadmin_email = WebSettings::where('setting_name','admin_email')->first();
        $web_url = WebSettings::where('setting_name','web_url')->first();

        //Banner Ad Code
        if($adcode){
            WebSettings::where('setting_name','banner_ad')->update([
                "setting_value"=>$banner_ad
            ]);
        }
        else{
            WebSettings::create([
                "setting_name"=>'banner_ad','setting_value'=>$banner_ad
            ]);
        }

        //Contact Setting
        if($contactSetting){
            WebSettings::where('setting_name','contact')->update([
               "setting_value"=>$contact
            ]);
        }
        else{
            WebSettings::create([
               "setting_name"=>'contact','setting_value'=>$contact
            ]);
        }


        //Web Title
        if($titlesetting){
            WebSettings::where('setting_name','title')->update([
                "setting_value"=>$webtitle
            ]);
        }
        else{
            WebSettings::create([
                "setting_name"=>'title','setting_value'=>$webtitle
            ]);
        }

        if($dbdescription){
            WebSettings::where('setting_name','description')->update([
                "setting_value"=>$description
            ]);
        }
        else{
            WebSettings::create([
                "setting_name"=>'description','setting_value'=>$description
            ]);
        }

        if($dbadmin_email){
            WebSettings::where('setting_name','admin_email')->update([
                "setting_value"=>$admin_email
            ]);
        }
        else{
            WebSettings::create([
                "setting_name"=>'admin_email','setting_value'=>$admin_email
            ]);
        }

        if($web_url){
            WebSettings::where('setting_name','web_url')->update([
                "setting_value"=>$url
            ]);
        }
        else{
            WebSettings::create([
                "setting_name"=>'web_url','setting_value'=>$url
            ]);
        }

        return response()->json([
           "success"=>true,
           "message"=>"Settings Updated"
        ]);
    }

    public function page(){
        $web_title = WebSettings::where('setting_name','title')->pluck('setting_value')->first();
        $admin_contact = WebSettings::where('setting_name','contact')->pluck('setting_value')->first();
        $banner_ad = WebSettings::where('setting_name','banner_ad')->pluck('setting_value')->first();
        $description = WebSettings::where('setting_name','description')->pluck('setting_value')->first();
        $email = WebSettings::where('setting_name','admin_email')->pluck('setting_value')->first();
        $url = WebSettings::where('setting_name','web_url')->pluck('setting_value')->first();

        return view('admin.web_settings',[
            "title"=>$web_title,
            "contact"=>$admin_contact,
            "banner_ad"=> htmlspecialchars_decode($banner_ad) ,
            "description"=>$description,
            "admin_email"=>$email,
            "web_url"=>$url,
        ]);
    }
}
