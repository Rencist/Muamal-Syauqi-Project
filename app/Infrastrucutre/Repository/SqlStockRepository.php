<?php

namespace App\Infrastrucutre\Repository;

use Exception;
use App\Core\Domain\Models\Email;
use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\User\User;
use App\Core\Domain\Models\Stock\Stock;
use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockType;
use App\Core\Domain\Repository\StockRepositoryInterface;

class SqlStockRepository implements StockRepositoryInterface
{
    public function persist(Stock $stock): void
    {
        DB::table('stock')->upsert([
            'id' => $stock->getId()->toString(),
            'user_id' => $stock->getUserId()->toString(),
            'stock_type' => $stock->getType()->value,
            'name' => $stock->getName(),
            'jumlah' => $stock->getJumlah(),
            'harga' => $stock->getHarga()
        ], 'id');
    }

    /**
     * @throws Exception
     */
    public function find(StockId $id): ?Stock
    {
        $row = DB::table('stock')->where('id', $id->toString())->first();

        if (!$row) return null;

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    public function findByUserId(UserId $user_id): ?Stock
    {
        $row = DB::table('stock')->where('user_id', $user_id->toString())->first();

        if (!$row) return null;

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    private function constructFromRow($row): Stock
    {
        return new Stock(
            new StockId($row->id),
            new UserId($row->user_id),
            StockType::from($row->stock_type),
            $row->name,
            $row->jumlah,
            $row->harga
        );
    }
}