<?php

declare(strict_types=1);

namespace App\Api\Weather\Request;

use App\Api\ClientRequestInterface;
use App\Api\Model\City;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class FetchClientRequest implements ClientRequestInterface
{
    private City $city;
    private ContainerBagInterface $params;

    public function __construct(City $city, ContainerBagInterface $params)
    {
        $this->city = $city;
        $this->params = $params;
    }

    public function getUrl(): string
    {
        return sprintf(
            'https://api.weatherapi.com/v1/forecast.json?key=%s&days=2&q=%s,%s',
            $this->getApiKey(),
            $this->city->getLatitude(),
            $this->city->getLongitude()
        );
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    private function getApiKey(): string
    {
        return $this->params->get('api_weather_key');
    }
}
