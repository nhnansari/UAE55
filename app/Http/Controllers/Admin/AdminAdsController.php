<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\PostedAds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\LivinServices\SiteSettingsFacade;

class AdminAdsController extends Controller
{
    //
    public function page(){
        return view('admin.ads_datatable');
    }
    public function datatable(Request $request){
       // $model = PostedAds::orderby('id','desc')->query();
        $status = $request->input('status') ?? null;
        $model = PostedAds::orderby('id','desc');

        if($status){
            $model->where('status',$status);
        }

        return DataTables::of($model)->make(true);
    }

    public function delete($id){
        $p = PostedAds::find($id);
        $p->delete();
        Favorite::where('ad_id',$id)->delete();
        return "deleted";
    }
    public function approve($id){
        $p = PostedAds::find($id);

        $title = $p->title;
        $user_id = $p->user_id;

        $p->status="approved";
        $p->save();

        $user = User::find($user_id);
        $email = $user->email;

        Mail::send('email.ad_approved', ["title"=>$title], function($message)use($email) {
            $message->to($email)->subject('Ad Approved');
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });
        return "approved";
    }

    public function reject($id){

        $p = PostedAds::find($id);
        $p->status="rejected";
        $title = $p->title;
        $user_id = $p->user_id;
        $p->save();

        $user = User::find($user_id);
        $email = $user->email;

        Mail::send('email.ad_approved', ["title"=>$title], function($message)use($email) {
            $message->to($email)->subject('Ad Rejected');
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });
        return "Rejected";

    }
}
