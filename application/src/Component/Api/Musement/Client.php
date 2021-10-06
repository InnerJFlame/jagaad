<?php

declare(strict_types=1);

namespace App\Component\Api\Musement;

use App\Component\Api\Model\City;
use App\Component\Api\Musement\Exception\FetchClientException;
use App\Component\Api\Musement\Request\FetchClientRequest;
use App\Component\Api\Musement\Response\FetchClientResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetch(): FetchClientResponse
    {
        try {
            $clientRequest = new FetchClientRequest();
            $response = $this->client->request($clientRequest->getMethod(), $clientRequest->getUrl());
            $cities = $response->toArray();

            $response = new FetchClientResponse();
            foreach ($cities as $city) {
                $response->addItem(new City($city['uuid'], $city['name'], $city['latitude'], $city['longitude']));
            }

            return $response;
        } catch (\Throwable $e) {
            throw new FetchClientException('Musement client exception', $e->getTrace());
        }
    }
}
