<?php

declare(strict_types=1);

use App\Api\Model\City;
use App\Api\Weather\Client;
use App\Api\Weather\Response\FetchClientResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherClientTest extends TestCase
{
    public function testFetch()
    {
        $mockClient = $this->createMock(HttpClientInterface::class);

        $mockParams = $this->createMock(ContainerBagInterface::class);
        $mockParams->method('get')->willReturn('api_key');

        $weatherClient = new Client($mockClient, $mockParams);

        $fetch = $weatherClient->fetch(new City('Amsterdam', 52.374, 4.9));

        $this->assertInstanceOf(FetchClientResponse::class, $fetch);
        $this->assertEquals('Amsterdam', $fetch->getCityName());
    }
}
