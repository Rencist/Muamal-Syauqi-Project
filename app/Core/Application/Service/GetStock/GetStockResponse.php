<?php 

namespace App\Core\Application\Service\GetStock;

use JsonSerializable;

class GetStockResponse implements JsonSerializable
{
    private string $id;
    private string $nama_petani;
    private string $stock_type;
    private string $name;
    private float $jumlah;
    private float $harga;

    public function __construct(string $id, string $nama_petani, string $stock_type, string $name, float $jumlah, float $harga) 
    {
        $this->id = $id;
        $this->nama_petani = $nama_petani;
        $this->stock_type = $stock_type;
        $this->name = $name;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'nama_petani' => $this->nama_petani,
            'stock_type' => $this->stock_type,
            'name' => $this->name,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
        ];
    }
}
