<?php 

namespace App\Core\Application\Service\BuyStock;

class BuyStockRequest
{
    private string $stock_id;
    private float $jumlah;
    private string $bukti_pembayaran;

    public function __construct(string $stock_id, float $jumlah,  string $bukti_pembayaran)
    {
        $this->stock_id = $stock_id;
        $this->jumlah = $jumlah;
        $this->bukti_pembayaran = $bukti_pembayaran;
    }

    public function getStockId(): string
    {
        return $this->stock_id;
    }

    /**
     * @return float
     */
    public function getJumlah(): float
    {
        return $this->jumlah;
    }

    /**
     * @return string
     */
    public function getBuktiPembayaran(): string
    {
        return $this->bukti_pembayaran;
    }
}

