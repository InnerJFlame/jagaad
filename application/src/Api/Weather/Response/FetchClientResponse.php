<?php

declare(strict_types=1);

namespace App\Api\Weather\Response;

use App\Api\ClientResponseInterface;

class FetchClientResponse implements ClientResponseInterface
{
    private string $cityName;
    private string $weatherToday;
    private string $weatherTomorrow;

    public function __construct(string $cityName, string $weatherToday, string $weatherTomorrow)
    {
        $this->cityName = $cityName;
        $this->weatherToday = $weatherToday;
        $this->weatherTomorrow = $weatherTomorrow;
    }

    public function getCityName(): string
    {
        return $this->cityName;
    }

    public function getWeatherToday(): string
    {
        return $this->weatherToday;
    }

    public function getWeatherTomorrow(): string
    {
        return $this->weatherTomorrow;
    }
}
