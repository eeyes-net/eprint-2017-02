<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'level', 'message', 'context',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
