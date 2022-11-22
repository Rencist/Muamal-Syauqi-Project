<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\AddStock\AddStockRequest;
use App\Core\Application\Service\AddStock\AddStockService;
use App\Core\Application\Service\GetStock\GetStockService;

class StockController extends Controller
{

    /**
     * @throws Exception
     */
    public function createStock(Request $request, AddStockService $service): JsonResponse
    {
        $input = new AddStockRequest(
            $request->input('name'),
            $request->input('jumlah'),
            $request->input('harga'),
            $request->input('type')
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

    public function getStock(GetStockService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response);
    }
 
}
