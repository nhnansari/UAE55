<?php

namespace App\Http\Controllers;

use App\Models\PostedAds;
use App\Models\User;
use App\traits\CommonFunctions;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdsController extends Controller
{
    //
    use CommonFunctions;
    public function listAds(Request $request){
        $price_min = $request->input('price_min') ?? null;
        $price_max = $request->input('price_max') ?? null;
        $emirate = $request->input('emirates') ?? null;
        $sold = $request->input('sold') ?? null;
         $ads = \App\Models\PostedAds::orderby('id','desc')->where('status','approved');

         if($price_max){
             $ads->where('price','<=',$price_max);
         }
         if($price_min){
             $ads->where('price','>=',$price_min);
         }
         if($emirate){
             $ads->where('emirates',$emirate);
         }
         if($sold=="sold"){
             $ads->where('status','sold');
         }
        return view('theme1.ads',[
            "ads"=>$ads->paginate(20),
            "price_min"=>$price_min,
            "price_max"=>$price_max,
            "emirates"=>$emirate,
        ]);
    }
    public function viewAd($ad){
        $ads = \App\Models\PostedAds::where('slug',$ad)->with('bids')->first();
        if($ad){
            $seller_id =$ads->user_id;
            $seller = User::where('id',$seller_id)->first();
            return view('theme1.view_ad',["ad"=>$ads,'seller'=>$seller]);

        }
        else{
            return NotFoundHttpException::class;
        }
    }
    public function markSold($id){
        $ad = \App\Models\PostedAds::where('id',$id)->first();
        if($ad){
            $seller_id =$ad->user_id;
            $user_id = $this->getUserId();
            if($seller_id==$user_id){
                $ad->update([
                    "status"=>"sold"
                ]);
                return response()->json("Marked as sold");
            }
            else{
                return NotFoundHttpException::class;
            }
        }
        else{
            return NotFoundHttpException::class;
        }
    }

    public function userAds(){
        $user = $this->getUserId();
        $ads = PostedAds::where('user_id',$user)->get();

        return view('theme1.user.my_ads',['ads'=>$ads,'counts'=>[
            "license_plate"=>count($ads)
        ]]);
    }
}
