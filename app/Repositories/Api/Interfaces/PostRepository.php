<?php


namespace App\Repositories\Api\Interfaces;


interface PostRepository extends BaseRepository
{
    public function getIfIsPostTime();
}
