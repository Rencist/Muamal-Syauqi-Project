<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\Stock\Stock;
use App\Core\Domain\Models\User\UserId;
use App\Core\Domain\Models\Stock\StockId;

interface StockRepositoryInterface
{
    public function persist(Stock $stock): void;

    public function find(StockId $id): ?Stock;

    public function findByUserId(UserId $user_id): ?Stock;
}
