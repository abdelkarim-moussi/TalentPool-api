<?php
namespace App\Repositories;
use App\Models\Application;
use App\Repositories\BaseRepositoryInterface;

class ApplicationRepository implements BaseRepositoryInterface
{

    
    public function all()
    {
        return Application::all();
    }

    public function find($id)
    {
        return Application::find($id);
    }

    public function create(array $data){

        $model = Application::create($data);
        return $model;

    }

    public function update($id, array $data)
    {
        $model = Application::find($id);
        $model->update($data);
        
        return $model;
        
    }

    public function delete($id)
    {
        return Application::destroy($id);
    }
}