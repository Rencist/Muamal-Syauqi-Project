<?php 

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\AddStock\AddStockRequest;
use App\Core\Application\Service\AddStock\AddStockService;
use App\Core\Application\Service\GetStock\GetStockService;

class StockController extends Controller
{
    public function getStock(GetStockService $service)
    {
        $response = $service->execute();
        return $this->successWithData($response);
    }

    public function addStock(Request $request, AddStockService $service)
    {
        $input = new AddStockRequest(
            $request->input('name'),
            $request->input('type'),
            $request->input('jumlah'),
            $request->input('harga')
        );

        DB::beginTransaction();
        try {
            $service->execute($input, $request->get('account'));
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $this->success();
    }
}