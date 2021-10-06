<?php

declare(strict_types=1);

namespace App\Api\Musement\Request;

use App\Api\ClientRequestInterface;

class FetchClientRequest implements ClientRequestInterface
{
    public function getUrl(): string
    {
        return 'https://api.musement.com/api/v3/cities';
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
