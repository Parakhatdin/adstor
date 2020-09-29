<?php


namespace App\Services\Api;


use App\Jobs\SendPost;
use App\Repositories\Api\Interfaces\PostRepository;
use App\Services\Api\Interfaces\PostService as PostServiceInterface;

class PostService extends BaseService implements PostServiceInterface
{
    private $job;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

    public function send($data)
    {
        if (!isset($data['post_time'])) {
            SendPost::dispatch($data);
            return "ok";
        }
        return $this->store($data);
    }

}
