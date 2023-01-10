<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FilesController extends Controller
{
    //

    public function uploadPage(){
        return view('admin.files');
    }
    public function listFonts(){
        $fonts_dir = App::basePath('resources'.DIRECTORY_SEPARATOR.'fonts');
        $fonts = File::allFiles($fonts_dir);
        $fonts_list=  [];

        foreach ($fonts as $font){
            $fonts_list[]=$font->getFilename();
        }
        return response()->json($fonts_list);
    }

    public function listImages(){
        $fonts_dir = App::basePath('resources'.DIRECTORY_SEPARATOR.'plates');
        $fonts = File::allFiles($fonts_dir);
        $fonts_list=  [];

        foreach ($fonts as $font){
            $fonts_list[]=$font->getFilename();
        }
        return response()->json($fonts_list);
    }
    public function getImageDimensions(Request $request){
        $image_name = $request->input('image');
        $images_dir = App::basePath('resources'.DIRECTORY_SEPARATOR.'plates'.DIRECTORY_SEPARATOR.$image_name);
       // $fonts = File::allFiles($fonts_dir);
        $fonts_list=  [];
        $file = File::get($images_dir);
        $height = Image::make($file)->height();
        $width = Image::make($file)->width();
        return response()->json(["width"=>$width,"height"=>$height]);
    }

    public function UploadFont(Request $request){

    }
    public function uploadLicensePlateFormat(Request $request){
        $title = $request->input('title') ?? null;
        $success =false;
        $message = "";
        if($title){
             $file = $request->file('image');
             $filename =$file->getClientOriginalName();
             $extension=$file->getClientOriginalExtension();
             $mime=$file->getMimeType();
             if(strtolower($mime)==="image/png"){
                 $actual_name = str_replace(" ","_",$title);
                 $path = resource_path('plates');
                $uploaded= $file->move($path,$actual_name.".png");
                if($uploaded){
                    $message = "Uploaded Successfully.";
                    $success = true;
                }
                else{
                    $message = "Cannot uploaded file due to filesystem issue.";
                }
             }
             else{
                 $message = "Only PNG images are supported.";
             }

        }
        else{
            $message = "Please give this file a title.";
        }
        return $message;
    }
    public function previewFormatFile($filename){
        $path = resource_path('plates'.DIRECTORY_SEPARATOR . $filename);
         return response()->download($path);
    }
    public function deleteFile($filename){
        $path = resource_path('plates'.DIRECTORY_SEPARATOR . $filename);
        File::delete($path);
         return "Deleted";
    }

}
