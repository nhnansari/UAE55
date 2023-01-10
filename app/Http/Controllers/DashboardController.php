<?php

namespace App\Http\Controllers;

use App\Models\PostedAds;
use App\Models\User;
use App\traits\CommonFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    use CommonFunctions;
    public function dashboard(){
        $user_id = $this->getUserId();
        $approved_ads = PostedAds::where('user_id',$user_id)->where('status','approved')->count();
        $pending = PostedAds::where('user_id',$user_id)->where('status','pending')->count();
        $sold = PostedAds::where('user_id',$user_id)->where('status','sold')->count();
        $total = PostedAds::where('user_id',$user_id)->count();

        return view('theme1.dashboard',[
            "counts"=>[
                "license_plate_total"=>$total,
                "license_plate_pending"=>$pending,
                "license_plate_approved"=>$approved_ads,
                "license_plate_sold"=>$sold,
            ]
        ]);
    }


}
