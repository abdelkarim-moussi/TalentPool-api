<?php
namespace App\Repositories;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data){

        $model = $this->model->create($data);
        return $model;

    }

    public function update($id, array $data)
    {
        $model = $this->model->find($id);
        $model->update($data);
        
        return $model;
        
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}