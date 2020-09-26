<?php


namespace App\Repositories\API\v1;

use App\Models\Channel;
use App\Repositories\API\v1\Interfaces\ChannelRepository as ChannelRepositoryInterface;
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
