<?php 

namespace App\Core\Application\Service\GetStock;

class GetStockService 
{
    private StockRepositoryInterface $stock_repository;

    /**
     * @param StockRepositoryInterface $stock_repository
     */
    public function __construct(StockRepositoryInterface $stock_repository)
    {
        $this->stock_repository = $stock_repository;
    }

    /**
     * @throws Exception
     */
    public function execute(): GetStockResponse
    {
        $stock = $this->stock_repository->getAll();
        if (!$stock) {
            UserException::throw("stock tidak ada", 1006, 404);
        }
        
        return new GetStockResponse($stock);
    }
}
