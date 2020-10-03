<?php


namespace App\Services;



use App\Services\Api\Interfaces\ChannelService;
use App\Services\Api\Interfaces\PublisherService;
use App\Services\Api\Interfaces\PostService;

class TelegramService
{
    const T_URL = "https://api.telegram.org/bot";

    /**
     * @var PublisherService
     */
    private $publisherService;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var PostService
     */
    private $postService;
    /**
     * @var ChannelService
     */
    private $channelService;

    private $post_id;

    /**
     * TelegramService constructor.
     * @param ChannelService $channelService
     * @param PublisherService $publisherService
     * @param RequestService $requestService
     * @param PostService $postService
     */
    public function __construct(
        ChannelService $channelService,
        PublisherService $publisherService,
        RequestService $requestService,
        PostService $postService
    )
    {
        $this->channelService = $channelService;
        $this->publisherService = $publisherService;
        $this->requestService = $requestService;
        $this->postService = $postService;
    }

    public function send($post_id)
    {
        $this->post_id = $post_id;
        $post = $this->postService->show($post_id);
        $channel = $this->postService->channel($post_id);
        $chat_id = $channel->telegram_id;
        $publisher = $this->channelService->publisher($channel->id);
        $bot_token = $publisher->bot_token;
        switch ($post->media_type) {

            case 'TEXT' :
                $body = [
                    'chat_id' => $chat_id,
                    'text' => $post->text
                ];
                $this->sendMessage($bot_token, $body);
                break;

            case 'PHOTO' :
                $body = [
                    'chat_id' => $chat_id,
                    'caption' => $post->text,
                    'photo' => $post->url,
                ];
                $this->sendPhoto($bot_token, $body);
                break;

            case 'VIDEO' :
                $body = [
                    'chat_id' => $chat_id,
                    'caption' => $post->text,
                    'video' => $post->url,
                ];
                $this->sendVideo($bot_token, $body);
                break;

            case 'DOCUMENT' :
                $body = [
                    'chat_id' => $chat_id,
                    'caption' => $post->text,
                    'document' => $post->url,
                ];
                $this->sendDocument($bot_token, $body);
                break;
        }
    }

    public function sendMessage($bot_token, $body)
    {
        $this->s('sendMessage', $bot_token, $body);
    }

    public function sendPhoto($bot_token, $body)
    {
        $this->s('sendPhoto', $bot_token, $body);
    }

    public function sendVideo($bot_token, $body)
    {
        $this->s('sendVideo', $bot_token, $body);
    }

    public function sendDocument($bot_token, $body)
    {
        $this->s('sendDocument', $bot_token, $body);
    }

    private function s($method, $bot_token, $body)
    {
        $url = self::T_URL.$bot_token."/".$method;
        $response = $this->requestService->sendPost($url, $body);
        $this->telegramResponse($response);
    }

    private function telegramResponse($response)
    {
        if ($response['ok']) {
            $data = [
                'status' => 'SENT',
                'chat_id' => $response['result']['chat']['id']
            ];
            $this->postService->update($data, $this->post_id);
        } else {
            info($response);
        }
    }
}
