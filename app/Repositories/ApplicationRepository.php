<?php
namespace App\Repositories;
use App\Models\Application;
use App\Repositories\BaseRepository;

class ApplicationRepository extends BaseRepository
{

    public function __construct(Application $application)
    {
        parent::__construct($application);
    }
    
}