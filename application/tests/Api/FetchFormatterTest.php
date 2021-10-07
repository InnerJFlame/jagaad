<?php

declare(strict_types=1);

use App\Api\Weather\Formatter\FetchFormatter;
use App\Api\Weather\Response\FetchClientResponse;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class FetchFormatterTest extends TestCase
{
    /**
     * @covers FetchFormatter::format
     */
    public function testFormat(): void
    {
        $response = new FetchClientResponse('Rome', 'Cloudy', 'Heavy rain');

        $formatResponse = (new FetchFormatter())->format($response);

        static::assertSame('Processed city Rome | Cloudy - Heavy rain', $formatResponse);
    }
}
