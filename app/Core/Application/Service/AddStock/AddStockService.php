<?php 

namespace App\Core\Application\Service\AddStock;

use App\Core\Domain\Models\Stock\Stock;
use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Models\Stock\StockType;
use App\Core\Domain\Repository\StockRepositoryInterface;
use App\Core\Application\Service\AddStock\AddStockRequest;
use App\Core\Application\Service\AddStock\AddStockResponse;

class AddStockService 
{
    private StockRepositoryInterface $stock_repository;

    /**
     * @param StockRepositoryInterface $stock_repository
     */
    public function __construct(StockRepositoryInterface $stock_repository)
    {
        $this->stock_repository = $stock_repository;
    }

    public function execute(AddStockRequest $request, UserAccount $account)
    {
        $stock = Stock::create(
            $account->getUserId(),
            StockType::from($request->getType()),
            $request->getName(),
            $request->getJumlah(),
            $request->getHarga(),
        );

        $this->stock_repository->persist($stock);
    }
}