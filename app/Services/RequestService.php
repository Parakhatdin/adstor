<?php

namespace App\Services;



class RequestService
{

    /**
     * RequestService constructor.
     */
    public function __construct()
    {
    }

    public function sendPost($url, $body)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $result = curl_exec($ch);
        if(curl_error($ch)){
            info(curl_error($ch));
        } else{
            info($result);
        }
    }

}