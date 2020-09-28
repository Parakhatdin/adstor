<?php


namespace App\Repositories\Api;

use App\Repositories\Api\Interfaces\BaseRepository as BaseRepositoryInterface;
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function getAll()
    {
        return $this->model->all();
    }

    public function store($validatedData)
    {
        return $this->model->create($validatedData);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function update($validatedData, $id)
    {
        return $this->model->where('id', $id)->update($validatedData);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
