<?php 

namespace App\Core\Application\Service\GrafikHarga;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\GrafikHarga\GrafikHargaResponse;

class GrafikHargaService 
{

    /**
     * @throws Exception
     */
    public function execute(): array
    {
        $query = DB::select(
            "
            select 
                avg(s.harga) as harga,
                date_format(s.created_at, '%M %Y') as bulan
            from stock s
            where s.status = 'stock'
            group by bulan
            "
        );
    
        $query_collection = collect($query);
        
        $graph_data = [
            "harga" => [],
            "bulan" => []
        ];

        $data = $query_collection
            ->map(function ($query) {
                return [
                    "harga" => $query->harga, 
                    "bulan" => $query->bulan
                ];
            })->values()->all();
        
        foreach($data as $dt) {
            array_push($graph_data["harga"], $dt["harga"]);
            array_push($graph_data["bulan"], $dt["bulan"]);
        }
        
        return $graph_data;
    }
}
