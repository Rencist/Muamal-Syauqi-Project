<?php 

namespace App\Core\Application\Service\MyStock;

use JsonSerializable;
use App\Exceptions\UserException;
use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Repository\StockRepositoryInterface;

class MyStockService {
    public function execute(UserAccount $account)
    {
        $query = DB::select(
            "
            select *
            from stock s
            where s.user_id = '{$account->getUserId()->toString()}'
            "
        );
        $query_collection = collect($query);
        $data = $query_collection
            ->map(function ($query) {
                return new MyStockResponse(
                    $query->stock_type,
                    $query->name,
                    $query->jumlah,
                    $query->harga,
                );
            })->values()->all();
        return $data;
    }
}
