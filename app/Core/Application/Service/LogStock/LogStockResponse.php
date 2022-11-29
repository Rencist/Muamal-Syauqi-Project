<?php 

namespace App\Core\Application\Service\LogStock;

use JsonSerializable;

class LogStockResponse implements JsonSerializable
{
    private string $nama_pembeli;
    private string $alamat;
    private float $jumlah;
    private float $harga;
    private string $date;

    public function __construct(string $nama_pembeli, string $alamat, float $jumlah, float $harga, string $date) 
    {
        $this->nama_pembeli = $nama_pembeli;
        $this->alamat = $alamat;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->date = $date;
    }

    public function jsonSerialize(): array
    {
        return [
            'nama_pembeli' => $this->nama_pembeli,
            'alamat' => $this->alamat,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'date' => $this->date
        ];
    }
}
