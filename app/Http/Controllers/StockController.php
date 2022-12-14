<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\User\UserType;
use App\Core\Application\Service\GetUserType;
use App\Core\Application\Service\MyStock\MyStockService;
use App\Core\Application\Service\AddStock\AddStockRequest;
use App\Core\Application\Service\AddStock\AddStockService;
use App\Core\Application\Service\BuyStock\BuyStockRequest;
use App\Core\Application\Service\BuyStock\BuyStockService;
use App\Core\Application\Service\GetStock\GetStockRequest;
use App\Core\Application\Service\GetStock\GetStockService;
use App\Core\Application\Service\LogStock\LogStockService;
use App\Core\Application\Service\StockEdit\StockEditRequest;
use App\Core\Application\Service\StockEdit\StockEditService;
use App\Core\Application\Service\GetStock\GrafikStockResponse;
use App\Core\Application\Service\DeleteStock\DeleteStockRequest;
use App\Core\Application\Service\DeleteStock\DeleteStockService;
use App\Core\Application\Service\GrafikHarga\GrafikHargaService;
use App\Core\Application\Service\GrafikStock\GrafikStockService;

class StockController extends Controller
{

    /**
     * @throws Exception
     */
    public function createStock(Request $request, AddStockService $service)
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
        return redirect('/my_stock');
    }

    public function allStock(Request $request, GetStockService $service)
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

    public function getStock(GetStockService $service)
    {
        $input = new GetStockRequest("stock");
        $response = $service->execute($input);
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);
        return view('stock.status-stock')->with('stocks', $data["data"]);
    }
    
    public function buyStock(Request $request, BuyStockService $service)
    {
        $input = new BuyStockRequest(
            $request->input('stock_id'),
            $request->input('jumlah')
        );

        DB::beginTransaction();
        try {
            $response = $service->execute($input, $request->get('account'));
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);

        return view('stock.receipt')->with('data', $data['data']);
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

    public function getGrafikStock(GrafikStockService $service)
    {
        $response = $service->execute();
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        return view('stock.grafik-stock')->with('data', $json->getContent());
    }

    public function getGrafikHarga(GrafikHargaService $service)
    {
        $response = $service->execute();
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        return view('stock.grafik-harga')->with('data', $json->getContent());
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

    public function viewEditStock(Request $request, GetStockService $service)
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
        return view('stock.admin-all-stock')->with('stocks', $data["data"]);
    }

    public function deleteStock(Request $request, DeleteStockService $service)
    {
        $input = new DeleteStockRequest($request->input('id'));
        $service->execute($input, UserType::from($request->cookie('userType')) );
        
        return $this->success();
    }

    
    /**
     * @throws Exception
     */
    public function editStock(Request $request, StockEditService $service)
    {
        $input = new StockEditRequest(
            $request->input('stock_id'),
            $request->input('name'),
            $request->input('jumlah'),
            $request->input('harga'),
            $request->input('type')
        );
        $service->execute($input, UserType::from($request->cookie('userType')));

        return redirect('/edit_stock');
    }
}
