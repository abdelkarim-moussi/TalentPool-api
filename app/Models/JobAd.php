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

    public function recruiter(){
        return $this->belongsTo(User::class);
    }

    public function applications(){
        return $this->hasMany(Application::class,'jobad_id');
    }
}
