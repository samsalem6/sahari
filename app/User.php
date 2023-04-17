<?php

namespace App;

use App\Model\Review;
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
    protected $fillable = [
        'name', 'email', 'password','roles','mobile','avatar','country','gender','job','address','birthday'
,'lastLogin'
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

    public function isAdmin()
    {
        if ($this->roles == 'admin')
        {
            return true;
        }
    }

    public function isUser()
    {
        if ($this->roles == 'user')
        {
            return true;
        }
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'user_id');
    }

}
