<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sooth extends Model
{
    use HasFactory;

    public static function rand()
    {
        $count = static::get()->count();
        return static::find(rand(1, $count))->sooth;
    }
}
