<?php


namespace App\Services\API;


use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;
use \App\Services\API\Interfaces\ChannelService as ChannelServiceInterface;

class ChannelService implements ChannelServiceInterface
{
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function show(Channel $post)
    {
        // TODO: Implement show() method.
    }

    public function update(Request $request, Channel $post)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Channel $post)
    {
        // TODO: Implement destroy() method.
    }
}
