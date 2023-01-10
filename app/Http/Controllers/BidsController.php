<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdIdRequest;
use App\Http\Requests\BidCloseRequest;
use App\Http\Requests\BidRequest;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidsController extends Controller
{
    //
    public function createBid($ad_id,BidRequest $request){
       // $ad_id = $request->input('ad');
        $price = $request->input('price');
        $user = \auth()->user()->id;
        $priceBid  = Bid::where('ad_id',$ad_id)->where('price','>=',$price)->first();
        $success = false;
        $message=  "";
        if($priceBid){
            $message=  "Someone has already offered this or higher price. Cannot place bid at this price.";
        }
        else{
            $success = true;
                $placedBid = Bid::where('user_id',$user)->where('ad_id',$ad_id)->first();
                if($placedBid){
                    Bid::where('id',$placedBid->id)->update([
                        "price"=>$price
                    ]);
                }
                else{
                    Bid::create([
                        "ad_id"=>$ad_id,'user_id'=>$user,'price'=>$price
                    ]);
                }
                $message= "Bid placed Successfully.";
        }

        return response()->json(["success"=>$success,'message'=>$message]);
    }
    public function markClosed(BidCloseRequest $request){
        $bid_id =$request->input('id');
        Bid::where('id',$bid_id)->update(["status"=>0]);
    }
    public function deleteBid(Request $request){
        $bid_id =$request->input('id');
        Bid::where('id',$bid_id)->update(["status"=>0]);
    }
    public function placedBids(){
        $user_id = Auth::user()->id;
        $bids = Bid::where('user_id',$user_id)->with('ad')->get();
        return response()->json($bids);
    }
    public function offeredBids(AdIdRequest $request){
        $ad = $request->input('id');
        $bids = Bid::where('ad_id',$ad)->with('ad')->get();
        return response()->json($bids);
    }


}
