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
                'candidate_id'=>'required',
                'jobad_id'=>'required',
                'cv'=>'required|file|mimes:pdf',
                'coverLetter'=>'required|file|mimes:pdf',
            ]
            );

        if($data->file('cv') && $data->file('coverLetter')){

            $validated['cv'] = $data->file('cv')->store('uploads', 'public');
            $validated['coverLetter'] = $data->file('coverLetter')->store('uploads', 'public');
        }

        return $this->appRepo->create($validated);
    }
}

