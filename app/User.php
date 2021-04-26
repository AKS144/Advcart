<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table = 'users';

    protected $fillable = [

        'fname',
        'email',
        'password',
        'lname',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
        'phone',
        'alternate_phone',
        'image',

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

    public function isUseronline()
    {
        return Cache::has('user-is-online'.$this->id);
    }
}
