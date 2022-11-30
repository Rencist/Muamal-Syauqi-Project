<?php 

namespace App\Core\Application\Service\GrafikStock;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\GrafikStock\GrafikStockResponse;

class GrafikStockService 
{

    /**
     * @throws Exception
     */
    public function execute(): array
    {
        $query = DB::select(
            "
            select 
                sum(s.jumlah) as jumlah,
                date_format(s.created_at, '%M %Y') as bulan
            from stock s
            where s.status = 'stock'
            group by bulan
            "
        );
    
        $query_collection = collect($query);
        
        $graph_data = [
            "jumlah" => [],
            "bulan" => []
        ];

        $data = $query_collection
            ->map(function ($query) {
                return [
                    "jumlah" => $query->jumlah, 
                    "bulan" => $query->bulan
                ];
            })->values()->all();
        
        foreach($data as $dt) {
            array_push($graph_data["jumlah"], $dt["jumlah"]);
            array_push($graph_data["bulan"], $dt["bulan"]);
        }
        
        return $graph_data;
    }
}
