<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCoteIvoireData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://covid2019-api.herokuapp.com/country/Cote_d%27Ivoire'
        );

        return $response->toArray();
    }
}
