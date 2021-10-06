<?php

declare(strict_types=1);

use App\Api\Weather\Formatter\FetchFormatter;
use App\Api\Weather\Response\FetchClientResponse;
use PHPUnit\Framework\TestCase;

class FetchFormatterTest extends TestCase
{
    public function testFormat()
    {
        $response = new FetchClientResponse('Rome', 'Cloudy', 'Heavy rain');
        $formatResponse = (new FetchFormatter())->format($response);
        $this->assertEquals('Processed city Rome | Cloudy - Heavy rain', $formatResponse);
    }
}
