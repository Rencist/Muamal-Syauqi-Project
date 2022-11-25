<?php 

namespace App\Core\Application\Service\GetStock;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\GetStock\GetStockResponse;

class GetStockService 
{

    /**
     * @throws Exception
     */
    public function execute(GetStockRequest $request): array
    {
        $additional_query = "";
        if($request->getStatus() != "")
            $additional_query = "where s.status = '{$request->getStatus()}'";

        $query = DB::select(
            "
            select 
                s.id, 
                (select u.name from user u where u.id = s.user_id) as nama_petani, 
                s.stock_type, 
                s.name, 
                s.jumlah, 
                s.harga
            from stock s
            {$additional_query}
            "
        );
        $query_collection = collect($query);
        $data = $query_collection
            ->map(function ($query) {
                return new GetStockResponse(
                    $query->id,
                    $query->nama_petani,
                    $query->stock_type,
                    $query->name,
                    $query->jumlah,
                    $query->harga,
                );
            })->values()->all();
        return $data;
    }
}
