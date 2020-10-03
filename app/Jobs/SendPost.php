<?php

namespace App\Jobs;

use App\Services\TelegramService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model_id;

    /**
     * Create a new job instance.
     * @param $data
     */
    public function __construct($model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * Execute the job.
     *
     * @param TelegramService $telegramService
     * @return void
     */
    public function handle(TelegramService $telegramService)
    {
        $telegramService->send($this->model_id);
    }

}
