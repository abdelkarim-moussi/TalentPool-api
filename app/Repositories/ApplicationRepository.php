<?php
namespace App\Repositories;
use App\Models\Application;
use App\Models\JobAd;
use App\Models\User;
use App\Notifications\ApplicationStatusNotification;
use App\Repositories\BaseRepository;
use App\Repositories\ApplicationInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApplicationRepository extends BaseRepository implements ApplicationInterface
{

    public function __construct(Application $application)
    {
        parent::__construct($application);
    }

    public function find($id)
    {
        $application = Application::find($id);

        if(Gate::denies('view',$application)){
           abort(403,'you are not allowed to view this application');
        }

        return $this->model->where('id',$id)->with('candidate')->get();
    }
    
    public function create(array $data){
         
        $application = DB::table('applications')->where('candidate_id',$data['candidate_id'])->where('jobad_id',$data['jobad_id'])->first();
    
        if($application !== null){

            abort(403,'you have already applied to this job');

        }
        return $application;

        if(Gate::denies('create',Application::class)){
            abort(403,'you are not allowed to apply to this jobAd');
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

        $user = User::find($application->candidate_id);

        $jobAd = JobAd::find($application->jobad_id);

        if($application->status === $status){

            abort(403,'this application already have this status');

        }
        
        $application->status = $status;
        $application->save();

        $data['hi'] = 'your application for : '. $jobAd->title .' has been ' .$application->status;
        $data['application_id'] = $application->id;

        $user->notify(new ApplicationStatusNotification($data));

        return $application;
        
    }
    
}