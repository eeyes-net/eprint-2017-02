<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
