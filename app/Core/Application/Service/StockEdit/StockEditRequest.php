<?php 

namespace App\Core\Application\Service\StockEdit;

class StockEditRequest
{

    private string $stock_id;
    private ?string $name;
    private ?float $jumlah;
    private ?float $harga;
    private ?string $type;

    public function __construct(string $stock_id, ?string $name, ?float $jumlah, ?float $harga, ?string $type)
    {
        $this->stock_id = $stock_id;
        $this->name = $name;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->type = $type;
    }

    public function getStockId(): string
    {
        return $this->stock_id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return ?float
     */
    public function getJumlah(): ?float
    {
        return $this->jumlah;
    }

    /**
     * @return ?float
     */
    public function getHarga(): ?float
    {
        return $this->harga;
    }
}

