<?php 

namespace App\Core\Application\Service\GetStock;

use JsonSerializable;

class GetStockResponse implements JsonSerializable
{
    private array $stock;

    public function __construct(array $stock) 
    {
        $this->stock = $stock;
    }

    public function jsonSerialize(): array
    {
        return [
            'stock' => $this->stock
        ];
    }
}
