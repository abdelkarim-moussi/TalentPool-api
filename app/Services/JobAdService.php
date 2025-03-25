<?php
namespace App\Services;

use App\Repositories\JobAdRepository;

class JobAdService
{
    public JobAdRepository $jobAdRepo;

    public function __construct(JobAdRepository $jobAdRepo)
    {
        $this->jobAdRepo = $jobAdRepo;
    }

    public function getAllJobAds(){
        return $this->jobAdRepo->all();
    }

    public function findJobAdById($id){
        return $this->jobAdRepo->find($id);
    }

    public function createJobAdd(object $data){

        $validated = $data->validate(
            [
                'recruiter_id'=>'required|exists:users,id',
                'title'=>'required|string|max:100',
                'description'=>'required|string|max:255',
                'salaryRange'=>'required|string|max:50',
                'location'=>'required|string|max:50'
            ]
            );

        return $this->jobAdRepo->create($validated);
    }


    public function updateJobAd($id,object $data){

         $validated = $data->validate(
            [
                'title'=>'required|string|max:100',
                'description'=>'required|string|max:255',
                'salaryRange'=>'required|string|max:50',
                'location'=>'required|string|max:50'
            ]
            );

        return $this->jobAdRepo->update($id,$validated);
    }

    public function deleteJobAd($id){

        return $this->jobAdRepo->delete($id);

    }
}

