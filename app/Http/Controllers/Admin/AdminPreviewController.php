<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSettings;
use Illuminate\Http\Request;
use App\LivinServices\CustomImagePainter;

class AdminPreviewController extends Controller
{
    //
    public function render(Request $request){
        $number = "55863";
        $paint_image = $request->input("image") ? $_POST["image"] :'';
        $print_letter = $request->input("print_letter")=='yes' ? true:false;
        $print_contact = $request->input("print_contact")=='yes' ? true:false;
        $letter_x = $request->input("letter_x") ??  0;
        $letter_y =$request->input("letter_y") ??  0;
        $contact_x = $request->input("contact_x") ?? 0;
        $contact_y = $request->input("contact_y") ??  0;
        $font_size = $request->input("font_size") ??  120;
        $license_font_file = $request->input("font") ??  '';
        $contact_font_size = $request->input("contact_font_size") ??  0;
        $letter_font_size = $request->input("letter_font_size") ?? 120;
        $contact_font_file = $request->input("contact_font_file") ??  null;
        $license_x = $request->input("license_x") ?? 0;
        $license_y = $request->input("license_y") ?? 0;
        $stamp = $request->input("stamp") ?? '';
        $stamp_x =$request->input("stamp_x") ?? 0;
        $stamp_y = $request->input("stamp_y")?? 0;

        $painter = new CustomImagePainter();
        $painter->picture=$paint_image;
        if($print_letter){
            $painter->letter="AA";
        }
        if($stamp=="english"){
            $painter->stamp="english.png";
        }
        elseif($stamp=="arabic"){
            $painter->stamp="arabic.png";
        }

        if($print_contact){
            $contact = WebSettings::where('setting_name','contact')->pluck('setting_value')->first();
            $painter->contact=$contact;
        }
        if($license_font_file){
            $painter->fontFile=$license_font_file;
        }
        $painter->license_x = $license_x;
        $painter->license_y = $license_y;
        $painter->letter_x = $letter_x;
        $painter->letter_y = $letter_y;
        $painter->contact_x = $contact_x;
        $painter->contact_y = $contact_y;
        $painter->contact_font_size = $contact_font_size;
        $painter->fontSize=$font_size;
        $painter->letter_font_size=$letter_font_size;
        $painter->contact_font_file=$contact_font_file;
        $painter->stamp_x=$stamp_x;
        $painter->stamp_y=$stamp_y;
        $image = $painter->paint($number);
        ob_start ();
        imagepng ($image);
        $image_data = ob_get_contents ();
        ob_end_clean ();
        $image_data_base64 = base64_encode ($image_data);
        $base64 = 'data:image/png;base64,' .$image_data_base64;
        return "<img src='".$base64."'>";
    }
}
