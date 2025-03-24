<?php
namespace App\Repositories;
use App\Models\Application;
use App\Repositories\BaseRepository;
use App\Repositories\ApplicationInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApplicationRepository extends BaseRepository implements ApplicationInterface
{

    public function __construct(Application $application)
    {
        parent::__construct($application);
    }
    
    public function create(array $data){
         
        $application = Application::where('candidate_id',$data['candidate_id'])->first();
    
        if($application){

            abort(403,'you have already applied to this job');

        }

        $model = $this->model->create($data);
        return $model;

    }

    public function withdraw($id){

        $application = Application::where('id',$id)->first();

        if($application->status === "withdrawed"){
            abort(403,'application allready withdrawed');
        }

        $application->status = 'withdrawed';
        $application->save();

        return $application;

    }

    public function updateApplicationStatus($id,$status){

        $application = Application::find($id);
     
        if($application->status === $status){

            abort(403,'this application already have this status');

        }
        
        $application->status = $status;
        $application->save();

        return $application;
    }
    
}