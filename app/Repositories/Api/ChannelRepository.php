<?php


namespace App\Repositories\Api;

use App\Models\Channel;
use App\Repositories\Api\Interfaces\ChannelRepository as ChannelRepositoryInterface;
class ChannelRepository extends BaseRepository implements ChannelRepositoryInterface
{

    /**
     * ChannelRepository constructor.
     * @param Channel $model
     */
    public function __construct(Channel $model)
    {
        $this->model = $model;
    }
}
