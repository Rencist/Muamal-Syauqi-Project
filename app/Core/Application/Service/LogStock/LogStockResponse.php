<?php 

namespace App\Core\Application\Service\LogStock;

use JsonSerializable;

class LogStockResponse implements JsonSerializable
{
    private string $nama_pembeli;
    private string $alamat;
    private float $jumlah;
    private float $harga;
    private string $bukti_pembayaran;
    private string $date;

    public function __construct(string $nama_pembeli, string $alamat, float $jumlah, float $harga, string $bukti_pembayaran, string $date) 
    {
        $this->nama_pembeli = $nama_pembeli;
        $this->alamat = $alamat;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->bukti_pembayaran = $bukti_pembayaran;
        $this->date = $date;
    }

    public function jsonSerialize(): array
    {
        return [
            'nama_pembeli' => $this->nama_pembeli,
            'alamat' => $this->alamat,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'bukti_pembayaran' => $this->bukti_pembayaran,
            'date' => $this->date
        ];
    }
}
