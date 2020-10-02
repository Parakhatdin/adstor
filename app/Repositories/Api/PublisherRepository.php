<?php


namespace App\Repositories\Api;

use App\Models\Publisher;
use App\Repositories\Api\Interfaces\PublisherRepository as PublisherRepositoryInterface;

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
