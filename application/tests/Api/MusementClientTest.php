<?php

declare(strict_types=1);

use App\Api\Musement\Client;
use App\Api\Musement\Response\FetchClientResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MusementClientTest extends TestCase
{
    public function testFetch()
    {
        $musementClient = new Client($this->createMock(HttpClientInterface::class));

        $fetch = $musementClient->fetch();

        $this->assertInstanceOf(FetchClientResponse::class, $fetch);
        $this->assertEmpty($fetch->getData());
    }
}
