<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\PlateFormat;
use App\Models\PostedAds;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminDashboardController extends Controller
{
    //
    public function page(){
        $total_ads = PostedAds::count();
        $pending_ads = PostedAds::where('status','pending')->count();
        $approved_ads = PostedAds::where('status','approved')->count();
        $rejected_ads = PostedAds::where('status','rejected')->count();

        $users = User::count();
        $bids = Bid::count();
        return view('admin.dashboard',
        [
            "total_ads"=>$total_ads,
            "pending_ads"=>$pending_ads,
            "approved_ads"=>$approved_ads,
            "rejected_ads"=>$rejected_ads,
            "users"=>$users,
            "bids"=>$bids,
        ]);
    }
    public function plates(){
        return view('admin.plate_formats_datatable');
    }    //
    public function platesDatatable(){
        $model = PlateFormat::query();

        return DataTables::of($model)->toJson();
    }
    public function add_page(){
        $contact_number = "+923065541251";
        return view('admin.add_plate_format',["contact_number"=>$contact_number]);
    }

    public function savePlate(Request $request){
        $proceed=true;
        $title = $request->input("title") ?? null;
        $image =$request->input("image") ?? null;
        $supports_letter =$request->input("print_letter") ?? null;
        $print_contact = $request->input("print_contact") ?? null;
        $number_font_size = $request->input("font_size") ?? null;
        $number_font_file = $request->input("font") ?? null;
        $number_x = $request->input("license_x") ?? null;
        $number_y = $request->input("license_y") ?? null;
        $letter_x = $request->input("letter_x") ?? null;
        $letter_y = $request->input("letter_y") ?? null;
        $contact_x = $request->input("contact_x") ?? null;
        $contact_y = $request->input("contact_y") ?? null;
        $contact_font_size = $request->input("contact_font_size") ?? 0;
        $contact_font_file =$request->input("contact_font_file") ?? 0;
        $stamp_y =$request->input("stamp_y") ?? 0;
        $stamp_x = $request->input("stamp_x") ?? 0;
        $letter_font_size = $request->input("letter_font_size")?? 100;
        if(!$title || !$image || !$number_x || !$number_y){
            $message = "Please select image, title and license number magrins";
            $proceed = false;
        }
        if($supports_letter=="yes"){
            if(!$letter_x || !$letter_y){
                $message = "Please enter Letter margins";
                $proceed = false;
            }
            $supports_letter=1;
        }
        else{
            $supports_letter=0;
        }
        if($print_contact=="yes"){
            if(!$contact_x || !$contact_y){
                $proceed = false;
                $message="Please enter Contact number margins";
            }
            $print_contact=1;
        }
        else{
            $print_contact=0;
        }

        $success = false;

        if($proceed){

            $s = PlateFormat::create([
                'title'=>$title,
                'image'=>$image,
                'supports_letter'=>$supports_letter,
                'print_contact'=>$print_contact,
                'number_font_size'=>$number_font_size,
                'number_font_file'=>$number_font_file,
                'number_x'=>$number_x,
                'number_y'=>$number_y,
                'letter_x'=>$letter_x,
                'letter_y'=>$letter_y,
                'contact_x'=>$contact_x,
                'contact_y'=>$contact_y,
                'letter_font_size'=>$letter_font_size,
                'contact_font_size'=>$contact_font_size,
                'stamp_x'=>$stamp_x,
                'stamp_y'=>$stamp_y,
                'contact_font_file'=>$contact_font_file,
                'status'=>1,
                'emirates'=>0,
            ]);
            if($s){
                $success = true;
                $message = "Added Successfully.";
            }
        }
        else{
            $message = "Recheck margins of the everything.";
        }

        return response()->json([
            "success"=>$success,
            "message"=>$message
        ]);
    }

    public function deletePlate($id){
        $plate=  PlateFormat::where('id',$id)->first();
        if($plate){
            $plate->delete();
            return "Deleted";
        }
        else{
            return "Format not found.";
        }

    }

    public function saveContact(Request $request){

    }

    public function renderPreview(Request $request){

    }

    public function listPlates(){

    }
}
