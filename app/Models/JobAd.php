<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class JobAd extends Model
{
    
    protected $fillable = [
        'recruiter_id',
        'title',
        'description',
        'salaryRange',
        'location'
    ];


    public function publishable() : MorphTo
    {
        return $this->morphTo(User::class);
    }
    
    public function applications()
    {
        return $this->morphMany(Application::class,'applicable');
    }
}
