<?php

declare(strict_types=1);

namespace App\Component\Api\Model;

class City
{
    private $uuid;
    private $cityName;
    private $latitude;
    private $longitude;

    public function __construct(string $uuid, string $cityName, float $latitude, float $longitude)
    {
        $this->uuid = $uuid;
        $this->cityName = $cityName;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getUuid(): string
    {
        return $this->uuid;
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
