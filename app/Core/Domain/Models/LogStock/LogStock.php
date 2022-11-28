<?php

namespace App\Core\Domain\Models\LogStock;

use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\LogStock\LogStockId;
use App\Core\Domain\Models\Stock\StockId;

class LogStock
{
    private LogStockId $id;
    private UserId $user_id;
    private StockId $stock_id;
    private float $jumlah;

    public function __construct(LogStockId $id, UserId $user_id, StockId $stock_id, float $jumlah)
    {
        $this->id = $id; 
        $this->user_id = $user_id;
        $this->stock_id = $stock_id;
        $this->jumlah = $jumlah;
    }

    public static function create(UserId $user_id, StockId $stock_id, float $jumlah): self
    {
        return new self(
            LogStockId::generate(),
            $user_id,
            $stock_id,
            $jumlah,
        );
    }

    /**
     * @return LogStockId
     */
    public function getId(): LogStockId
    {
        return $this->id;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return StockId
     */
    public function getStockId(): StockId
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
