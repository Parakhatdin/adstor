<?php


namespace App\Repositories\API\v1;

use App\Models\Publisher;
use \App\Repositories\API\v1\Interfaces\PublisherRepository as PublisherRepositoryInterface;

class PublisherRepository implements PublisherRepositoryInterface
{
    private $model;

    /**
     * PublisherRepository constructor.
     * @param Publisher $model
     */
    public function __construct(Publisher $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function store($validatedData)
    {
        $this->model->create($validatedData);
        return "ok";
    }
}
