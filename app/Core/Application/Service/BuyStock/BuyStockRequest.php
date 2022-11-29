<?php 

namespace App\Core\Application\Service\BuyStock;

class BuyStockRequest
{
    private string $stock_id;
    private float $jumlah;

    public function __construct(string $stock_id, float $jumlah)
    {
        $this->stock_id = $stock_id;
        $this->jumlah = $jumlah;
    }

    public function getStockId(): string
    {
        return $this->stock_id;
    }

    /**
     * @return float
     */
    public function getJumlah(): float
    {
        return $this->jumlah;
    }
}

