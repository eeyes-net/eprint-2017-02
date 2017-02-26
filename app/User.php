<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'name', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function metas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function logs()
    {
        return $this->hasMany(UserLog::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
