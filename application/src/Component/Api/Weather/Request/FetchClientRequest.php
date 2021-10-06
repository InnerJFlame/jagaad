<?php

declare(strict_types=1);

namespace App\Component\Api\Weather\Request;

use App\Component\Api\ClientRequestInterface;

class FetchClientRequest implements ClientRequestInterface
{
    public function getUrl(): string
    {
        return 'https://api.weatherapi.com/v1/forecast.json?key=f9cefda29ca14959983150200210510&q=52.374,4.9&days=2';
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
