<?php 

namespace App\Core\Application\Service\GetStock;

use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\GetStock\GetStockResponse;

class GetStockService 
{

    /**
     * @throws Exception
     */
    public function execute(): array
    {
        $query = DB::select(
            "
            select id, user_id, stock_type, name, jumlah, harga
            from stock
            order by id desc
            "
        );
        $query_collection = collect($query);
        $data = $query_collection
            ->map(function ($query) {
                return new GetStockResponse(
                    $query->id,
                    $query->user_id,
                    $query->stock_type,
                    $query->name,
                    $query->jumlah,
                    $query->harga,
                );
            })->values()->all();
        return $data;
    }
}
