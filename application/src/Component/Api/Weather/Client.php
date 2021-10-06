<?php

declare(strict_types=1);

namespace App\Component\Api\Weather;

use App\Component\Api\Model\City;
use App\Component\Api\Weather\Exception\FetchClientException;
use App\Component\Api\Weather\Request\FetchClientRequest;
use App\Component\Api\Weather\Request\FetchClientResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetch(City $city): FetchClientResponse
    {
        try {
            $clientRequest = new FetchClientRequest();
            $response = $this->client->request($clientRequest->getMethod(), $clientRequest->getUrl());
            $weather = $response->toArray();

            return new FetchClientResponse(
                $city->getCityName(),
                $weather['forecast']['forecastday'][0]['day']['condition']['text'],
                $weather['forecast']['forecastday'][1]['day']['condition']['text']
            );
        } catch (\Throwable $e) {
            throw new FetchClientException('Weather client exception', $e->getTrace());
        }
    }
}
