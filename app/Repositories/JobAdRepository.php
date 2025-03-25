<?php
namespace App\Repositories;

use App\Models\JobAd;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Gate;

class JobAdRepository extends BaseRepository
{

public function __construct(JobAd $jobad)
{
    parent::__construct($jobad);

}

public function create(array $data)
{

    if(! Gate::allows('create',JobAd::class)){
        abort(403,'you are not authorized to create a jobAd');
    }

    $model = $this->model->create($data);
    return $model;
}

public function update($id, array $data)
{
    $requestJob = JobAd::find($id);
    if(! $requestJob){
        abort(403,'jobAd not exist');
    }

    if(! Gate::allows('update',$requestJob)){
        abort(403,'you are not allowed to update this jobAd');
    }
    
    $model = $this->model->find($id);
    $model->update($data);
    return $model;

}

public function delete($id)
{

    $jobAd = JobAd::find($id);

    if(Gate::denies('delete',$jobAd)){
       abort(403,'you are not allowed to delete this JobAd');
    }

    $this->model->destroy($id);
    
    return response()->json(
        [
            'message'=>'jobAd deleted succefully'
        ]
        );
}

}