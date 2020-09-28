<?php


namespace App\Services\Api;


use App\Repositories\Api\Interfaces\ChannelRepository;
use App\Services\Api\Interfaces\ChannelService as ChannelServiceInterface;

class ChannelService extends BaseService implements ChannelServiceInterface
{
    /**
     * ChannelService constructor.
     * @param ChannelRepository $channelRepository
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        $this->repository = $channelRepository;
    }
}
