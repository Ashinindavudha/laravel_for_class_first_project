<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
            //  $this->addMediaConversion('large')
            // ->width(1536)//Define large image size in pixels
            // ->height(1536);
    }

    
}
