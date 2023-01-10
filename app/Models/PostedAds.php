<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\CommonFunctions;
class PostedAds extends Model
{
    use HasFactory, CommonFunctions;
    protected $fillable=[
        "user_id",
        "title",
        "picture",
        "emirates",
        "price",
        "contact",
        "description",
        "thumbnail",
        "status",
        "slug",
        "license_number",
    ];
    public function bids(){
      return  $this->hasMany(Bid::class,'ad_id','id');
    }
    public function getTimeAgoAttribute()
    {
        if(isset($this->attributes["created_at"]))
        {
            $date =  $this->attributes["created_at"];
            $cf = Carbon::createFromDate($date);
            return $cf->diffForHumans();
        }
        return "";

    }
    public function getisFavoriteAttribute()
    {
        if(isset($this->attributes["id"]))
        {
            $user_id = $this->getUserId();
            if($user_id){
                $id =  $this->attributes["id"];
                $isFavorite = Favorite::where('user_id',$user_id)->where('ad_id',$id)->exists();
                return $isFavorite;
            }
            else{
                return  false;
            }

        }
        return false;

    }
    protected $appends = ['TimeAgo','isFavorite'];

}
