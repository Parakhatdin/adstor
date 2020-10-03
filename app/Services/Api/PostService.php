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
        $model =  $this->store($data);
        if ($model) {
            if ($model->post_time == null) {
                SendPost::dispatch($model->id);
            }
            return "success";
        }
        return "error";
    }

    public function checkDate()
    {
        return $this->repository->getIfIsPostTime();
    }

    public function channel($id)
    {
        return $this->repository->channel($id);
    }
}
