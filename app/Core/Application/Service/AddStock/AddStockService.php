<?php 

namespace App\Core\Application\Service\AddStock;

use App\Core\Domain\Models\UserAccount;
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

    public function execute(AddStockRequest $request, UserAccount $account): AddStockResponse
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