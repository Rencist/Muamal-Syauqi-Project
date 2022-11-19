<?php

namespace App\Core\Domain\Models\Stock;

use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockType;
use PHPUnit\Framework\SelfDescribing;

class Stock
{
    private StockId $id;
    private UserId $user_id;
    private StockType $type;
    private string $name;
    private float $jumlah;
    private float $harga;

    /**
     * @param StockId $id
     */
    public function __construct(StockId $id, UserId $user_id, StockType $type, string $name, float $jumlah, float $harga)
    {
        $this->id = $id; 
        $this->user_id = $user_id; 
        $this->type = $type; 
        $this->name = $name;
        $this->jumlah = $jumlah; 
        $this->harga = $harga;
    }

    public static function create(UserId $user_id, StockType $type, string $name, float $jumlah, float $harga): self
    {
        return new self(
            StockId::generate(),
            $user_id,
            $type,
            $name,
            $jumlah,
            $harga
        );
    }

    /**
     * @return StockId
     */
    public function getId(): StockId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
