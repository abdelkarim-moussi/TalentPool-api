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

    public function candidate()
    {
        return $this->belongsTo(User::class);
    }

    public function jobAd(){
        return $this->belongsTo(JobAd::class,'jobad_id');
    }

}
