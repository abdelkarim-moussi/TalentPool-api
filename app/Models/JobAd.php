<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAd extends Model
{
    
    protected $fillable = [
        'recruiter_id',
        'title',
        'description',
        'salaryRange',
        'location'
    ];
    
}
