<?php


namespace App\Services\API;


use App\Models\Post;
use App\Models\Publisher;
use Illuminate\Http\Request;
use \App\Services\API\Interfaces\PublisherService as PublisherServiceInterface;

class PublisherService implements PublisherServiceInterface
{
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function show(Publisher $post)
    {
        // TODO: Implement show() method.
    }

    public function update(Request $request, Publisher $post)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Publisher $post)
    {
        // TODO: Implement destroy() method.
    }
}
