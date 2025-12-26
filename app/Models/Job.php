<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'job_title',
        'location',
        'description',
        'deadline',
        'salary',
        'experience',
        'employment_type',
    ];
}
