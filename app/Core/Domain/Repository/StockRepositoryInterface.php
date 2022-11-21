<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\Stock\Stock;

interface UserRepositoryInterface
{
    public function persist(Stock $stock): void;
    public function getAll(): array;
}
