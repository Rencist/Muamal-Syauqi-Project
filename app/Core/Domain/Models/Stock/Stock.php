<?php

namespace App\Core\Domain\Models\Stock;

use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockType;

class Stock
{
    private StockId $id;
    private UserId $user_id;
    private StockType $type;
    private float $jumlah;
    private float $harga;

    /**
     * @param StockId $id
     */
    public function __construct(StockId $id, UserId $user_id, StockType $type, float $jumlah, float $harga)
    {
        $this->id = $id; 
        $this->user_id = $user_id; 
        $this->type = $type; 
        $this->jumlah = $jumlah; 
        $this->harga = $harga;
    }

    /**
     * @return StockId
     */
    public function getId(): StockId
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
     * @return StockType
     */
    public function getType(): StockType
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getJumlah(): float
    {
        return $this->jumlah;
    }

    /**
     * @return float
     */
    public function getHarga(): float
    {
        return $this->harga;
    }
}
