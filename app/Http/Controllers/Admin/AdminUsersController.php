<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminUsersController extends Controller
{
    //
    public function dataTablePage(){
        return view('admin.users_datatable');
    }
    public function dataTable(Request $request){
        $model = User::orderby('id','desc')->where('name','!=','admin');

        return DataTables::of($model)->make(true);
    }
    public function banUser($id){
        $user = User::where('id',$id)->first();
        if($user){
            User::where('id',$id)->update([
               "status"=>0
            ]);
            return "User Banned";
        }
        else{
            return "User not found.";
        }
    }
    public function unBanUser($id){
        $user = User::where('id',$id)->first();
        if($user){
            User::where('id',$id)->update([
                "status"=>1
            ]);
            return "User un Banned";
        }
        else{
            return "User not found.";
        }
    }
    public function deleteUser($id){
        $user = User::where('id',$id)->first();
        if($user){
            User::where('id',$id)->delete();
            return "User deleted";
        }
        else{
            return "User not found.";
        }
    }
    public function makeAdmin($id){
        $user = User::where('id',$id)->first();
        if($user){
            $user->assignRole('admin');
            return "Made Admin";
        }
        else{
            return "User not found.";
        }
    }
}
