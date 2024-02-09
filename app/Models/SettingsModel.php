<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    protected $fillable = [
        'email', 'password', 'phone',
    ];
}
