<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable=[
      "user_id","ad_id"
    ];

    public function getTimeAgoAttribute()
    {
        $date = $this->attributes["favorite_date"] ?? $this->attributes["created_at"];
        $today = Carbon::today();
        $cf = Carbon::createFromDate($date);
        return $cf->diffForHumans();
    }

    protected $appends = ['TimeAgo'];
}
