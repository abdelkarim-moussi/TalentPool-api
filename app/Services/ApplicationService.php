<?php
namespace App\Services;

use App\Models\Application;
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

    public function findApplicationById($id){
        return $this->appRepo->find($id);
    }

    public function createApplication(object $data){
        $validated = $data->validate(
            [
                'candidate_id'=>'required|exists:users,id',
                'jobad_id'=>'required|exists:iusers,id',
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

    public function updateApplication($id,object $data){

        $validated = $data->validate(
            [
                'cv'=>'file|mimes:pdf',
                'coverLetter'=>'file|mimes:pdf',
            ]
            );

        if($data->file('cv') && $data->file('coverLetter')){

            $validated['cv'] = $data->file('cv')->store('uploads', 'public');
            $validated['coverLetter'] = $data->file('coverLetter')->store('uploads', 'public');

        }

        return $this->appRepo->update($id,$validated);
    }

    public function deleteApplication($id){

        if(!$this->appRepo->delete($id)){

            return response()->json(
                [
                    'error'=>'this application dosen\'t exist'
                ]
                );
        }

        return $this->appRepo->delete($id);

    }
}

