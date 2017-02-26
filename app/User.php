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

    public function getMeta($name, $default = null)
    {
        $meta = $this->metas()->where('name', $name)->first();
        if (!$meta) {
            return $default;
        }
        return unserialize($meta->value);
    }

    public function metas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function setMeta($name, $value)
    {
        $meta = $this->metas()->where('name', $name)->first();
        if (!$meta) {
            $meta = new UserMeta(compact('name'));
        }
        $meta->value = serialize($value);
        $this->metas()->save($meta);
        return $meta;
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
