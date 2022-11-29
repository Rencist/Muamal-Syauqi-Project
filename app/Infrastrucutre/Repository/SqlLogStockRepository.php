<?php

namespace App\Infrastrucutre\Repository;

use Exception;
use App\Core\Domain\Models\Email;
use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\User\User;
use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\LogStock\LogStock;
use App\Core\Domain\Models\LogStock\LogStockId;
use App\Core\Domain\Models\LogStock\LogStockType;
use App\Core\Domain\Models\LogStock\LogStockStatus;
use App\Core\Domain\Repository\LogStockRepositoryInterface;

class SqlLogStockRepository implements LogStockRepositoryInterface
{
    public function persist(LogStock $log_stock): void
    {
        DB::table('log_stock')->upsert([
            'id' => $log_stock->getId()->toString(),
            'user_id' => $log_stock->getUserId()->toString(),
            'stock_id' => $log_stock->getStockId()->toString(),
            'jumlah' => $log_stock->getJumlah(),
            'bukti_pembayaran' => $log_stock->getBuktiPembayaran()
        ], 'id');
    }

    /**
     * @throws Exception
     */
    public function find(LogStockId $id): ?LogStock
    {
        $row = DB::table('log_stock')->where('id', $id->toString())->first();

        if (!$row) return null;

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    public function findByUserId(UserId $user_id): ?LogStock
    {
        $row = DB::table('log_stock')->where('user_id', $user_id->toString())->first();

        if (!$row) return null;

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    public function findByStockId(StockId $stock_id): ?LogStock
    {
        $row = DB::table('log_stock')->where('stock_id', $stock_id->toString())->first();

        if (!$row) return null;

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    private function constructFromRow($row): LogStock
    {
        return new LogStock(
            new LogStockId($row->id),
            new UserId($row->user_id),
            new StockId($row->stock_id),
            $row->jumlah,
            $row->bukti_pembayaran
        );
    }
}