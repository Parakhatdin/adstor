<?php


namespace App\Services\Api;


use App\Repositories\Api\Interfaces\PostRepository;
use App\Services\Api\Interfaces\PostService as PostServiceInterface;

class PostService extends BaseService implements PostServiceInterface
{

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

}
