<?php

namespace App\Http\Controllers;

use App\Http\Requests\PainRequest;
use App\Http\Requests\PlateAdRequest;
use App\LivinServices\CustomImagePainter;
use App\LivinServices\SiteSettingsFacade;
use App\Models\PlateFormat;
use App\Models\PostedAds;
use App\Models\WebSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LicensePlateGeneratorController extends Controller
{
    //

    public function formats(){
        $formats = PlateFormat::get();
        return response()->json($formats);
    }
    public function paint(){
        return view('theme1.paint');
    }
    public function new_ad(){
        return view('theme1.newad.plate');
    }
    public function renderPlate(Request $request){
        $emirates_id =$request->input('format') ?? null;
        $number =$request->input('number') ?? null;
        $letter =$request->input('letter') ?? null;
        $stamp =$request->input('stamp') ?? null;
        $format = PlateFormat::where('id',$emirates_id)->first();
        if($format){
            $info = $format;
            $number_x = $info->number_x;
            $number_y = $info->number_y;
            $letter_x = $info->letter_x;
            $letter_y = $info->letter_y;
            $contact_x = $info->contact_x;
            $contact_y = $info->contact_y;
            $supports_letter = $info->supports_letter;
            $print_contact = $info->print_contact;
            $number_font_size = $info->number_font_size;
            $number_font_file = $info->number_font_file;
            $image = $info->image;
            $contact_font_size = $info->contact_font_size;
            $letter_font_size = $info->letter_font_size;
            $contact_font_file = $info->contact_font_file;
            $stamp_x = $info->stamp_x;
            $stamp_y = $info->stamp_y;

            $painter = new CustomImagePainter();
            $painter->picture=$image;

            if($supports_letter){
                $painter->letter=$letter;
            }

            $painter->license_x = $number_x;
            $painter->license_y = $number_y;
            $painter->letter_x = $letter_x;
            $painter->letter_y = $letter_y;
          //  $painter->contact_x = $contact_x;
           // $painter->contact_y = $contact_y;
           // $painter->contact_font_size = $contact_font_size;
            $painter->fontSize = $number_font_size ?? 50;
            $painter->letter_font_size=$letter_font_size;
          //  $painter->contact_font_file=$contact_font_file;
            $painter->stamp_x=$stamp_x;
            $painter->stamp_y=$stamp_y;

            if($stamp==='english'){
                $painter->stamp="english.png";
            }
            elseif($stamp==="arabic"){
                $painter->stamp="arabic.png";
            }
           /*
            if($print_contact){
                $contact = WebSettings::where('setting_name','contact')->pluck('setting_value')->first();
                $painter->contact=$contact;
            }
           */
            $painter->fontFile = $number_font_file;

            $image = $painter->paint($number);
            ob_start ();
            imagepng ($image);
            $image_data = ob_get_contents ();
            ob_end_clean ();
            $image_data_base64 = base64_encode ($image_data);
            $base64 = 'data:image/png;base64,' .$image_data_base64;
            return  "<img src='".$base64."'>";
        }
        else{
            return "Invalid Emirates";
        }
    }
    public function renderPlateAd(PlateAdRequest $request){

        $user_id =Auth::user()->id ?? 0;
        $format_id =$request->input('format') ?? null;
        $title =$request->input('title') ?? null;
        $number =$request->input('number') ?? null;
        $emirates =$request->input('emirates') ?? null;
        $contact =$request->input('contact') ?? null;
        $description =$request->input('description') ?? null;
        $letter =$request->input('letter') ?? null;
        $stamp =$request->input('stamp') ?? null;
        $price =$request->input('price') ?? null;

        $short_title = substr($title,0,100);
        $recentAds = PostedAds::count();
        $new_ad_id= $recentAds +1;
        $slug = str_replace(" ","_",$short_title);
        $slug .= "_".$new_ad_id;
        $success = false;
        $message ="";
        $rendered_image=null;
        if($format_id && $number && $emirates && $contact && $description){
            $format = PlateFormat::where('id',$format_id)->first();
            if($format){
                $info = $format;
                $number_x = $info->number_x;
                $number_y = $info->number_y;
                $letter_x = $info->letter_x;
                $letter_y = $info->letter_y;
                $contact_x = $info->contact_x;
                $contact_y = $info->contact_y;
                $supports_letter = $info->supports_letter;
                $number_font_size = $info->number_font_size;
                $number_font_file = $info->number_font_file;
                $image = $info->image;
                $contact_font_size = $info->contact_font_size;
                $letter_font_size = $info->letter_font_size;
                $contact_font_file = $info->contact_font_file;
                $stamp_x = $info->stamp_x;
                $stamp_y = $info->stamp_y;

                $painter = new CustomImagePainter();
                $painter->picture=$image;

                if($supports_letter){
                    $painter->letter=$letter;
                }

                $painter->license_x = $number_x;
                $painter->license_y = $number_y;
                $painter->letter_x = $letter_x;
                $painter->letter_y = $letter_y;
              //  $painter->contact_x = $contact_x;
             //   $painter->contact_y = $contact_y;
               // $painter->contact_font_size = $contact_font_size;
                $painter->fontSize = $number_font_size ?? 50;
                $painter->letter_font_size=$letter_font_size;
             //   $painter->contact_font_file=$contact_font_file;
                $painter->stamp_x=$stamp_x;
                $painter->stamp_y=$stamp_y;

                if($stamp==='english'){
                    $painter->stamp="english.png";
                }
                elseif($stamp==="arabic"){
                    $painter->stamp="arabic.png";
                }

                $painter->fontFile = $number_font_file;

                $random = Str::random(15);
                $filename = $random.$user_id.".png";
                $fileurl = App::basePath('public'.DIRECTORY_SEPARATOR.'rendered'.DIRECTORY_SEPARATOR.$filename);
                $painter->savePath = $fileurl;
                $image = $painter->paint($number);

                PostedAds::create([
                    "user_id"=>$user_id,
                    "picture"=>$filename,
                    "title"=>$title,
                    "emirates"=>$emirates,
                    "contact"=>$contact,
                    "description"=>$description,
                    "slug"=>$slug,
                    "license_number"=>$number,
                    "price"=>$price,
                ]);
                Mail::send('email.ad_posted', ["title"=>$title], function($message) {
                    $message->to(SiteSettingsFacade::adminEmail())->subject('New Ad Posted');
                    $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                });

                ob_start ();
                imagepng ($image);
                $image_data = ob_get_contents ();
                ob_end_clean ();
                $image_data_base64 = base64_encode ($image_data);
                $base64 = 'data:image/png;base64,' .$image_data_base64;

                $success = true;
                $rendered_image= "<img src='".$base64."'>";
                $message = "Your ad has been posted and will be approved by admin.";
            }
            else{
                $message= "Invalid Emirates";
            }
        }
        else{
            $message = "Missing some required information.";
        }
        return response()->json([
            "image"=>$rendered_image ,
            "message"=>$message,
            "success"=>$success
        ]);
    }
    public function save(Request $request){

    }

}
