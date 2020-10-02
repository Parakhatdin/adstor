<?php


namespace App\Services\Api;

use App\Repositories\Api\Interfaces\PublisherRepository;
use App\Services\Api\Interfaces\PublisherService as PublisherServiceInterface;

class PublisherService extends BaseService implements PublisherServiceInterface
{

    /**
     * PublisherService constructor.
     * @param PublisherRepository $publisherRepository
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->repository = $publisherRepository;
    }

}
