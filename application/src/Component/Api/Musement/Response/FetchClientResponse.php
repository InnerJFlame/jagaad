<?php

declare(strict_types=1);

namespace App\Component\Api\Musement\Response;

use App\Component\Api\ClientResponseInterface;
use App\Component\Api\Model\City;

class FetchClientResponse implements ClientResponseInterface
{
    private $data;

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
