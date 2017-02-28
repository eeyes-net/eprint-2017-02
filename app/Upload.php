<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Upload extends Model
{

    protected $fillable = ['name', 'size', 'rel_path'];

    public static function createFromUpload(UploadedFile $file)
    {
        $rel_path = date('Ym/d');
        $filename = date('Y_m_d_His') . '_' . $file->getClientOriginalName();
        $file->storeAs($rel_path, $filename, 'uploads');
        return new self([
            'name' => $file->getClientOriginalName(),
            'size' => $file->getClientSize(),
            'rel_path' => $rel_path . '/' . $filename,
        ]);
    }

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
