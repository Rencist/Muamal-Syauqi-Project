<?php

namespace App\Core\Domain\Models\Stock;

enum StockType: string 
{
    case CABAI = 'cabai';
    case JAMU = 'jamu';
}