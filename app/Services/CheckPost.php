<?php


namespace App\Services;


use App\Jobs\SendPost;
use App\Services\Api\Interfaces\PostService;

class CheckPost
{
    private $postService, $telegramService;

    /**
     * CheckPost constructor.
     * @param PostService $postService
     * @param TelegramService $telegramService
     */
    public function __construct(PostService $postService, TelegramService $telegramService)
    {
        $this->postService = $postService;
        $this->telegramService = $telegramService;
    }

    public function check()
    {
        $model = $this->postService->checkDate();
        if ($model){
            SendPost::dispatch($model->id);
        }
    }
}
