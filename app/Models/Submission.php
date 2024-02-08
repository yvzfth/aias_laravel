<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = [
        'submission_period',
        'name',
        'surname',
        'email',
        'title',
        'faculty',
        'department',
        'work_name',
        'basic_field',
        'scientific_field',
        'persons',
        'academic_activity_type',
        'activity',
        'doi_number',
        'file_path',
        'score',
        'status',
        'comment',
        'comment_by',
        'comment_date',
    ];
}
