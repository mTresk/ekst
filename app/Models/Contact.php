<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address', 'email', 'phone', 'schedule', 'vk', 'telegram', 'whatsapp', 'unit'];

    protected $casts = ['unit' => 'array'];
}
