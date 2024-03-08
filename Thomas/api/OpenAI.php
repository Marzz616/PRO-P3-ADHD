<?php

namespace OpenAI;

require_once '../config/config.php';

class Completion extends APIResource
{
    public static function create($params)
    {
        return self::_create($params);
    }
}

class APIResource
{
    public static function _create($params)
    {
        $apiKey = OPENAI_API_KEY;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ]);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception('Error:' . curl_error($ch));
        }
        curl_close($ch);

        return json_decode($response);
    }
}

class API
{
    public static $apiKey;
}