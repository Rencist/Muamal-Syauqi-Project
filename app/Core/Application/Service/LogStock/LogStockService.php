<?php 

namespace App\Core\Application\Service\LogStock;

use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\UserAccount;
use App\Core\Application\Service\LogStock\LogStockResponse;

class LogStockService {
    public function execute()
    {
        $query = DB::select(
            "
            select
                ls.id, 
                (select u.name from user u where u.id = ls.user_id) as nama_pembeli, 
                (select u.address from user u where u.id = ls.user_id) as alamat,
                ls.jumlah,
                (select s.harga from stock s where s.id = ls.stock_id) as harga,
                ls.created_at as date
            from log_stock ls
            "
        );
        $query_collection = collect($query);
        $data = $query_collection
            ->map(function ($query) {
                return new LogStockResponse(
                    $query->nama_pembeli,
                    $query->alamat,
                    $query->jumlah,
                    $query->harga,
                    $query->date
                );
            })->values()->all();
        return $data;
    }
}
