<?php
namespace App\Repositories;

use App\Models\JobAd;
use App\Repositories\BaseRepository;

class JobAdRepository extends BaseRepository
{

public function __construct(JobAd $jobad)
{
    parent::__construct($jobad);

}
}