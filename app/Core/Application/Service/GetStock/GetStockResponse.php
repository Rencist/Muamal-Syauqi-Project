<?php 

namespace App\Core\Application\Service\GetStock;

use JsonSerializable;

class GetStockResponse implements JsonSerializable
{
    private string $id;
    private string $user_id;
    private string $stock_type;
    private string $name;
    private float $jumlah;
    private float $harga;

    public function __construct(string $id, string $user_id, string $stock_type, string $name, float $jumlah, float $harga) 
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->stock_type = $stock_type;
        $this->name = $name;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'stock_type' => $this->stock_type,
            'name' => $this->name,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
        ];
    }
}
