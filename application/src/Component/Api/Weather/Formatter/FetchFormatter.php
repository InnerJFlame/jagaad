<?php

declare(strict_types=1);

namespace App\Component\Api\Weather\Request;

class FetchFormatter
{
    public function format(FetchClientResponse $response): string
    {
        return sprintf(
            'Processed city %s | %s - %s',
            $response->getCityName(),
            $response->getWeatherToday(),
            $response->getWeatherTomorrow()
        );
    }
}
