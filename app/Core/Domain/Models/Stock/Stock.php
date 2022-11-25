<?php

namespace App\Core\Domain\Models\Stock;

use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockType;
use PHPUnit\Framework\SelfDescribing;

class Stock
{
    private StockId $id;
    private UserId $petani_id;
    private ?UserId $pembeli_id;

    private StockType $type;
    private string $name;
    private float $jumlah;
    private float $harga;

    /**
     * @param StockId $id
     */
    public function __construct(StockId $id, UserId $petani_id, ?UserId $pembeli_id, StockType $type, string $name, float $jumlah, float $harga)
    {
        $this->id = $id; 
        $this->petani_id = $petani_id; 
        $this->pembeli_id = $pembeli_id; 
        $this->type = $type; 
        $this->name = $name;
        $this->jumlah = $jumlah; 
        $this->harga = $harga;
    }

    public static function create(UserId $petani_id, StockType $type, string $name, float $jumlah, float $harga): self
    {
        return new self(
            StockId::generate(),
            $petani_id,
            null,
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
    public function getPetaniId(): UserId
    {
        return $this->petani_id;
    }

    public function getPembeliId(): UserId
    {
        return $this->pembeli_id;
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
    public function setJumlah(float $jumlah): void
    {
        $this->jumlah = $jumlah;
    }

    /**
     * @return float
     */
    public function getHarga(): float
    {
        return $this->harga;
    }
}
