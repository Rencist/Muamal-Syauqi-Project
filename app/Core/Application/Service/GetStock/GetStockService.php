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
            $additional_query = "and s.status = '{$request->getStatus()}'";

        $query = DB::select(
            "
            select 
                s.id, 
                (select u.name from user u where u.id = s.user_id) as nama_petani,
                (select u.address from user u where u.id = s.user_id) as alamat, 
                s.stock_type, 
                s.name, 
                s.jumlah, 
                s.hargag
            from stock s
            where s.jumlah > 0
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
                    $query->alamat,
                    $query->jumlah,
                    $query->harga,
                );
            })->values()->all();
        return $data;
    }
}
