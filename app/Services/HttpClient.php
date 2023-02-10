<?php

namespace App\Services;

use GuzzleHttp\Client;

class HttpClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get($url)
    {
        return $this->client->get($url);
    }

    public function post($url, $data)
    {
        return $this->client->post($url, [
            'form_params' => $data
        ]);
    }

    public function put($url, $data)
    {
        return $this->client->put($url, [
            'form_params' => $data
        ]);
    }

    public function delete($url)
    {
        return $this->client->delete($url);
    }
}
