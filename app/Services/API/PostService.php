<?php


namespace App\Services\API;


use App\Models\Post;
use Illuminate\Http\Request;
use \App\Services\API\Interfaces\PostService as PostServiceInterface;

class PostService implements PostServiceInterface
{
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
