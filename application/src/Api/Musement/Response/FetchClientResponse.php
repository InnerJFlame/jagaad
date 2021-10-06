<?php

declare(strict_types=1);

namespace App\Api\Musement\Response;

use App\Api\ClientResponseInterface;
use App\Api\Model\City;

class FetchClientResponse implements ClientResponseInterface
{
    private array $data = [];

    public function addItem(City $item): self
    {
        $this->data[] = $item;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
