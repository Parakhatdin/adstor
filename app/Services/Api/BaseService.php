<?php


namespace App\Services\Api;


use App\Services\Api\Interfaces\BaseService as BaseServiceInterface;
use http\Exception;
use PDOException;

class BaseService implements BaseServiceInterface
{
    protected $repository;

    public function index()
    {
        return $this->repository->getAll();
    }

    public function store($data)
    {
        try {
            return $this->repository->store($data);
        } catch (PDOException $e) {
            return "duplicated";
        }
    }

    public function show($id)
    {
        $a = $this->repository->getById($id);
        if (!$a){
            return "error";
        }
        return $a;
    }

    public function update($data, $id)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            return "error";
        }
    }
}
