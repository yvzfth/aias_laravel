<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkademikTabloTesvik extends Model
{
    use HasFactory;

    protected $table = 'submissions'; // Define the table name

    protected $primaryKey = 'id'; // Define the primary key field

    protected $fillable = [
        "id",
        'name',
        'surname',
        'email',
        'title',
        'faculty',
        'department',
        'basic_field',
        'scientific_field',
        'academic_activity_type',
        'activity',
        'work_name',
        'doi_number',
        'persons',
        'coefficient',
        'incentive_point',
        'user_id',
        'reg_date',
        'folder_uuid',
        'folder_path',
        'total_size',
        'onay_durum',
        'submission_period'
    ];

    // Define any other model methods or relationships here
}
