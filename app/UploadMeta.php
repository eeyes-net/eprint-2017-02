<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadMeta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'value',
    ];

    public function upload()
    {
        return $this->belongsTo(Upload::class);
    }
}
