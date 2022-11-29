<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\MyStock\MyStockService;
use App\Core\Application\Service\AddStock\AddStockRequest;
use App\Core\Application\Service\AddStock\AddStockService;
use App\Core\Application\Service\BuyStock\BuyStockRequest;
use App\Core\Application\Service\BuyStock\BuyStockService;
use App\Core\Application\Service\GetStock\GetStockRequest;
use App\Core\Application\Service\GetStock\GetStockService;
use App\Core\Application\Service\LogStock\LogStockService;

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

    public function getStock(Request $request, GetStockService $service)
    {
        $input = new GetStockRequest($request->input('status')? $request->input('status') : "");
        $response = $service->execute($input);
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);
        return view('stock.all-stock')->with('stocks', $data["data"]);
    }
    
    public function buyStock(Request $request, BuyStockService $service): JsonResponse
    {
        $input = new BuyStockRequest(
            $request->input('stock_id'),
            $request->input('jumlah'),
            $request->input('bukti_pembayaran')
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

    public function myStock(Request $request, MyStockService $service)
    {
        $response = $service->execute($request->get('account'));
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);
        return view('stock.my-stock')->with('stocks', $data["data"]);
    }

    public function getLogStock(LogStockService $service)
    {
        $response = $service->execute();
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);
        return view('stock.log-stock')->with('stocks', $data["data"]);
    }

    public function viewCreateStock()
    {
        return view('stock.create-stock');
    }
}
