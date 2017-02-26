<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploads()
    {
        return $this->belongsToMany(Upload::class);
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
        return $this->hasMany(OrderMeta::class);
    }

    public function setMeta($name, $value)
    {
        $meta = $this->metas()->where('name', $name)->first();
        if (!$meta) {
            $meta = new OrderMeta(compact('name'));
        }
        $meta->value = serialize($value);
        $this->metas()->save($meta);
        return $meta;
    }
}
