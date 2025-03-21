<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    
    protected $fillable = [
        'candidate_id',
        'jobad_id',
        'cv',
        'coverLetter'
    ];


}
