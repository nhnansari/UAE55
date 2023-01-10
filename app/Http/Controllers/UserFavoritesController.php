<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\PostedAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller
{
    //
    public function addFavorite($ad){
        $success = false;
        $message= "";
        $exists = PostedAds::where('id',$ad)->exists();
        if($exists){
            $user_id = Auth::user()->id;
            $added = Favorite::where('ad_id',$ad)->where('user_id',$user_id)->exists();
            if(!$added){
                Favorite::create([
                    "user_id"=>$user_id,
                    "ad_id"=>$ad
                ]);
                $success = true;
                $message = "Added to favorites successfully.";
            }
           else{
               $message = "Already in favorites.";
           }
        }
        else{
            $message= "Invalid ad";
        }
        return response()->json([
           "success"=>$success,
           "message"=>$message
        ]);
    }
    public function removeFavorite($id){
        $success = false;
        $message= "";
        $user_id = Auth::user()->id;

        $exists = Favorite::where('id',$id)->where('user_id',$user_id)->first();
        if($exists){
            $exists->delete();
            $success = true;
        }
        else{
            $message= "Invalid ad";
        }
        return response()->json([
            "success"=>$success,
            "message"=>$message
        ]);
    }
    public function listFavorites(){
        $user_id = Auth::user()->id;
        $cols=[
          "favorites.id as favorite_id",
          "favorites.ad_id",
          "favorites.user_id",
          "favorites.created_at as favorite_date",
          "posted_ads.created_at as ad_date",
          "posted_ads.contact",
          "posted_ads.description",
          "posted_ads.emirates",
          "posted_ads.picture",
          "posted_ads.title",
          "posted_ads.price",
          "posted_ads.slug",
          "posted_ads.license_number",
         ];
        $favorites = Favorite::leftjoin('posted_ads','posted_ads.id','=','favorites.ad_id')
            ->where('favorites.user_id',$user_id)
            ->select($cols)
            ->paginate();

        return view('theme1.favorites',["favorites"=>$favorites]);
    }
}
