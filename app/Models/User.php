<?php

namespace App\Models;

 use Carbon\Carbon;
 use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 use Spatie\Permission\Traits\HasRoles;

 class User extends Authenticatable
{

     use HasApiTokens, Notifiable,HasRoles;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'permissions',
        'mobile',
        'address',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'email',
        'permissions',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];
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
