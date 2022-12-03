<?php 

namespace App\Core\Application\Service\DeleteStock;

class DeleteStockRequest
{
    private string $stock_id;

    public function __construct(string $stock_id)
    {
        $this->stock_id = $stock_id;
    }

    public function getStockId(): string
    {
        return $this->stock_id;
    }
}

