<?php 

namespace App\Core\Domain\Models\Stock;

enum StockStatus: string
{
    case STOCK = "stock";
    case BOUGHT = "bought";
}