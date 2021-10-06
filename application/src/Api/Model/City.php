<?php

declare(strict_types=1);

namespace App\Api\Model;

class City
{
    private string $cityName;
    private float $latitude;
    private float $longitude;

    public function __construct(string $cityName, float $latitude, float $longitude)
    {
        $this->cityName = $cityName;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getCityName(): string
    {
        return $this->cityName;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
