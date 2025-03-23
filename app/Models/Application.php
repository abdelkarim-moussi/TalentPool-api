<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Application extends Model
{
    
    protected $fillable = [
        'candidate_id',
        'jobad_id',
        'cv',
        'coverLetter'
    ];

    public function applicable():MorphTo
    {
        return $this->morphTo(JobAd::class);
    }

    public function candidatable():MorphTo
    {
        return $this->morphTo(User::class);
    }
}
