<?php
namespace App\Repositories;
use App\Models\Application;
use App\Repositories\BaseRepository;
use App\Repositories\ApplicationInterface;

class ApplicationRepository extends BaseRepository implements ApplicationInterface
{

    public function __construct(Application $application)
    {
        parent::__construct($application);
    }

    public function withdraw($id){

        $application = Application::where('id',$id)->first();
        $application->status = 'withdrawed';
        
        return $application;
    }
    
}