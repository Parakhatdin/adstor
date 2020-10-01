<?php


namespace App\Services;



use App\Services\Api\Interfaces\ChannelService;
use App\Services\Api\Interfaces\PublisherService;

class TelegramService
{
    const T_URL = "https://api.telegram.org/bot";

    private $channelService, $publisherService, $requestService;

    /**
     * TelegramService constructor.
     * @param ChannelService $channelService
     * @param PublisherService $publisherService
     * @param RequestService $requestService
     */
    public function __construct(
        ChannelService $channelService,
        PublisherService $publisherService,
        RequestService $requestService
    )
    {
        $this->channelService = $channelService;
        $this->publisherService = $publisherService;
        $this->requestService = $requestService;
    }

    public function send($data)
    {
        $channel = $this->channelService->show($data['channel_id']);
        $chat_id = $channel->telegram_id;
        $publisher = $this->publisherService->show($channel->publisher_id);
        $bot_token = $publisher->bot_token;
        if ($data['media_type'] == 'TEXT') {
            $body = [
                'chat_id' => $chat_id,
                'text' => $data['text']
            ];
            $this->sendMessage($bot_token, $body);
        } elseif ($data['media_type'] == 'PHOTO') {
            $body = [
                'chat_id' => $chat_id,
                'caption' => $data["text"],
                'photo' => $data['url'],
            ];
            $this->sendPhoto($bot_token, $body);
        } elseif ($data['media_type'] == 'VIDEO') {
            $this->sendVideo($data);
        } elseif ($data['media_type'] == 'DOCUMENT') {
            $this->sendDocument($data);
        }
    }

    public function sendMessage($bot_token, $body)
    {
        $url = self::T_URL.$bot_token.'/sendMessage';
        $this->requestService->sendPost($url, $body);
    }

    public function sendPhoto($bot_token, $body)
    {
        $url = self::T_URL.$bot_token.'/sendPhoto';
        $this->requestService->sendPost($url, $body);
    }

    public function sendVideo($data)
    {

    }

    public function sendDocument($data)
    {

    }
}
