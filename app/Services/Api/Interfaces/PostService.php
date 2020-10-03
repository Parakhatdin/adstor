<?php


namespace App\Services\Api\Interfaces;

interface PostService extends BaseService
{
    public function send($data);

    public function checkDate();

    public function channel($id);
}
