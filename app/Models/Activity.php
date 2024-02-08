<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Add this line
        'academic_activity_type',
        'activity_id',
        'description',
        'point',
    ];
}
