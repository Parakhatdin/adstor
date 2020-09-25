<?php


namespace App\Services\API\v1;


use App\Models\Post;
use App\Repositories\API\v1\Interfaces\PostRepository;
use Illuminate\Http\Request;
use \App\Services\API\v1\Interfaces\PostService as PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postRepository;

    /**
     * PostService constructor.
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        // TODO: Implement index() method.
        return "uraaa !!!!!!!!!!!";
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function show(Post $post)
    {
        // TODO: Implement show() method.
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Post $post)
    {
        // TODO: Implement destroy() method.
    }
}
