<?php

declare(strict_types=1);

namespace App\Api\Weather\Formatter;

use App\Api\Weather\Response\FetchClientResponse;

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
