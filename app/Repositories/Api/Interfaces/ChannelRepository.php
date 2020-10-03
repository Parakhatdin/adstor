<?php


namespace App\Repositories\Api\Interfaces;


interface ChannelRepository extends BaseRepository
{
    public function publisher($id);
}
