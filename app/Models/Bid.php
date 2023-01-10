<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $table='bids';
    protected $fillable=[
      "ad_id","user_id","price","status"
    ];
    public function ad(){
        $this->hasOne(PlacedAds::class,'ad_id','id');
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
    protected $appends = ['TimeAgo'];
}
