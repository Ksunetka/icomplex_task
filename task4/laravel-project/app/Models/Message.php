<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Message extends Model
{
    protected $table = 'messages';

    public function getCreatedAtAttribute($data)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $data)->format('H:i:s / d.m.Y');
    }
}
