<?php

declare(strict_types=1);

namespace App\Api\Musement;

use App\Api\Model\City;
use App\Api\Musement\Exception\FetchClientException;
use App\Api\Musement\Request\FetchClientRequest;
use App\Api\Musement\Response\FetchClientResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class Client
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetch(): FetchClientResponse
    {
        try {
            $clientRequest = new FetchClientRequest();
            $cities = $this->client->request($clientRequest->getMethod(), $clientRequest->getUrl())->toArray();

            $response = new FetchClientResponse();
            foreach ($cities as $city) {
                $response->addItem(new City($city['name'], $city['latitude'], $city['longitude']));
            }

            return $response;
        } catch (Throwable $e) {
            throw new FetchClientException($e->getMessage(), $e->getTrace());
        }
    }
}
