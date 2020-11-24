<?php

namespace App\Clients;

class StockStatus
{
    public $available;
    public $price;

    public function __construct(bool $available,int $price)
    {
        $this->price = $price;
        $this->available = $available;
    }
}
