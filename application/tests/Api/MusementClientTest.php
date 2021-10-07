<?php

declare(strict_types=1);

use App\Api\Musement\Client;
use App\Api\Musement\Response\FetchClientResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @internal
 * @coversDefaultClass Client
 */
final class MusementClientTest extends TestCase
{
    /**
     * @covers Client::fetch
     */
    public function testFetch(): void
    {
        $musementClient = new Client($this->createMock(HttpClientInterface::class));

        $fetch = $musementClient->fetch();

        static::assertInstanceOf(FetchClientResponse::class, $fetch);
        static::assertEmpty($fetch->getData());
    }
}
