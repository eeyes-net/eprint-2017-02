<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'value'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
