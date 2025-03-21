<?php
namespace App\Services;
use App\Repositories\ApplicationRepository;

class ApplicationService
{
    public ApplicationRepository $appRepo;

    public function __construct(ApplicationRepository $appRepo)
    {
        $this->appRepo = $appRepo;
    }

    public function getAllApplications(){
        return $this->appRepo->all();
    }
}
