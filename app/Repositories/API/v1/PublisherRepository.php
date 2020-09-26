<?php


namespace App\Repositories\API\v1;

use App\Models\Publisher;
use \App\Repositories\API\v1\Interfaces\PublisherRepository as PublisherRepositoryInterface;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    /**
     * PublisherRepository constructor.
     * @param Publisher $model
     */
    public function __construct(Publisher $model)
    {
        $this->model = $model;
    }
}
