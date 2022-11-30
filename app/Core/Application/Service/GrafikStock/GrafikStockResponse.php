<?php 

namespace App\Core\Application\Service\GetStock;

use JsonSerializable;

class GrafikStockResponse implements JsonSerializable
{
    private float $jumlah;
    private int $bulan;

    public function __construct(float $jumlah, int $bulan) 
    {
        $this->jumlah = $jumlah;
        $this->bulan = $bulan;
    }

    public function jsonSerialize(): array
    {
        return [
            'jumlah' => $this->jumlah,
            'bulan' => $this->bulan
        ];
    }
}
