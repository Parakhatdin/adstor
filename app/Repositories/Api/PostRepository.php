<?php


namespace App\Repositories\Api;

use App\Models\Post;
use App\Repositories\Api\Interfaces\PostRepository as PostRepositoryInterface;


class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getIfIsPostTime()
    {
        return $this->model->where('post_time', '<=', date('Y-m-d H:i:s'))->first();
    }
}
