<?php 

namespace App\Core\Application\Service\GetHarga;

use JsonSerializable;

class GrafikHargaResponse implements JsonSerializable
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
