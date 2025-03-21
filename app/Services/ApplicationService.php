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

    public function findById($id){
        return $this->appRepo->find($id);
    }

    public function createApp(object $data){
        $validated = $data->validate(
            [
                'candidate_id'=>'required|exists:users,id',
                'jobad_id'=>'required|exists:jobads,id',
                'cv'=>'required',
                'coverLetter'=>'required'
            ]
            );

        return $this->appRepo->create($validated);
    }
}

