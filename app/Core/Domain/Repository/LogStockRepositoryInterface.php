<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\LogStock\LogStock;
use App\Core\Domain\Models\LogStock\LogStockId;

interface LogStockRepositoryInterface
{
    public function persist(LogStock $Logstock): void;

    public function find(LogStockId $id): ?LogStock;

    public function findByUserId(UserId $user_id): ?LogStock;
    
    public function findByStockId(StockId $stock_id): ?LogStock;
}
