<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

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
        return $this->hasMany(UploadMeta::class);
    }

    public function setMeta($name, $value)
    {
        $meta = $this->metas()->where('name', $name)->first();
        if (!$meta) {
            $meta = new UploadMeta(compact('name'));
        }
        $meta->value = serialize($value);
        $this->metas()->save($meta);
        return $meta;
    }
}
