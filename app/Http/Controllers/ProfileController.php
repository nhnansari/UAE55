<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\traits\CommonFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    use CommonFunctions;
    public function page(){
        $user_id= $this->getUserId();
        $user=User::where('id',$user_id)->first();
        return view('theme1.profile',['profile'=>$user]);
    }
    public function update(ProfileUpdateRequest $request){

        $mobile=  $request->input('mobile');
        $address=  $request->input('address');
        $name=  $request->input('name');

        $user_id = $this->getUserId();
        User::where('id',$user_id)->update([
           "mobile"=>$mobile,
           "address"=>$address,
           "name"=>$name
        ]);
        return "Profile Updated successfully.";
    }
}
