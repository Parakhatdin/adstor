<?php


namespace App\Repositories\API\v1;

use App\Models\Post;
use App\Repositories\API\v1\Interfaces\PostRepository as PostRepositoryInterface;
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
}
