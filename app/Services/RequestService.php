<?php

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RequestService
{

    private $client;

    /**
     * RequestService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendPost($url, $body)
    {
        try {
            return $this->client->post($url, ['body' => $body]);
        } catch (GuzzleException $e) {
            return "error";
        }
    }

}
