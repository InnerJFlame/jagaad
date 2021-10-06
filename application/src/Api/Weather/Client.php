<?php

declare(strict_types=1);

namespace App\Api\Weather;

use App\Api\Model\City;
use App\Api\Weather\Exception\FetchClientException;
use App\Api\Weather\Request\FetchClientRequest;
use App\Api\Weather\Response\FetchClientResponse;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class Client
{
    private HttpClientInterface $client;
    private ContainerBagInterface $params;

    public function __construct(HttpClientInterface $client, ContainerBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }

    public function fetch(City $city): FetchClientResponse
    {
        try {
            $clientRequest = new FetchClientRequest($city, $this->params);
            $weather = $this->client->request($clientRequest->getMethod(), $clientRequest->getUrl())->toArray();

            return new FetchClientResponse(
                $city->getCityName() ?? '',
                $weather['forecast']['forecastday'][0]['day']['condition']['text'] ?? '',
                $weather['forecast']['forecastday'][1]['day']['condition']['text'] ?? ''
            );
        } catch (Throwable $e) {
            throw new FetchClientException($e->getMessage(), $e->getTrace());
        }
    }
}
