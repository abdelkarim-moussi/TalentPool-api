<?php

use App\Models\Application;

class ApplicationRepository implements applicationRepositoryInterface
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

        $application = Application::create($data);
        return $application;

    }

    public function update($id, array $data)
    {
        $application = Application::find($id);
        $application->update($data);
        
        return $application;
        
    }

    public function delete($id)
    {
        return Application::destroy($id);
    }


}