<?php


namespace App\Services\API\v1;


use App\Models\Channel;
use App\Models\Post;
use App\Repositories\API\v1\Interfaces\ChannelRepository;
use Illuminate\Http\Request;
use \App\Services\API\v1\Interfaces\ChannelService as ChannelServiceInterface;

class ChannelService implements ChannelServiceInterface
{
    private $channelRepository;

    /**
     * ChannelService constructor.
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

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
