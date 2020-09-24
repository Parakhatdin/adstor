<?php


namespace App\Services;


use App\Models\Post;
use App\Notifications\PhotoPost;
use App\Notifications\TextPost;
use Illuminate\Support\Facades\Notification;

class TelegramService
{
    public function send($telegram_id)
    {
        $a = Notification::route('telegram', $telegram_id)
            ->notify(new PhotoPost(['text' => "hello my fr", 'media' => "https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_1MB.jpg"]));
        return json_encode($a);
    }
}
