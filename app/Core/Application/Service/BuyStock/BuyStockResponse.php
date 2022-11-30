<?php

namespace App\Core\Application\Service\BuyStock;

use JsonSerializable;

class BuyStockResponse implements JsonSerializable
{
    private string $stock_type;
    private string $name;
    private float $jumlah;
    private float $harga;
    private string $user_type;

    public function __construct(string $stock_type, string $name,float $jumlah, float $harga, string $user_type) 
    {
        $this->stock_type = $stock_type;
        $this->name = $name;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->user_type = $user_type;
    }

    public function jsonSerialize(): array
    {
        return [
            'stock_type' => $this->stock_type,
            'name' => $this->name,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'user_type' => $this->user_type,
        ];
    }
}