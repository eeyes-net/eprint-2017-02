<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'value',
    ];

    public static function getOption($name, $default = null)
    {
        $option = self::where('name', $name)->first();
        if (!$option) {
            return $default;
        }
        return unserialize($option->value);
    }

    public static function setOption($name, $value)
    {
        $option = self::where('name', $name)->first();
        if (!$option) {
            $option = new Option(compact('name'));
        }
        $option->value = serialize($value);
        $option->save();
        return $option;
    }
}
