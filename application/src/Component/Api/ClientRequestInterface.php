<?php

declare(strict_types=1);

namespace App\Component\Api;

interface ClientRequestInterface
{
    public function getUrl(): string;
    public function getMethod(): string;
}
