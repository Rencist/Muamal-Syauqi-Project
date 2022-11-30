<?php 

namespace App\Core\Application\Service\BuyStock;

use App\Exceptions\UserException;
use App\Core\Domain\Models\Stock\Stock;
use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockStatus;
use App\Core\Domain\Repository\StockRepositoryInterface;
use App\Core\Application\Service\BuyStock\BuyStockRequest;
use App\Core\Domain\Models\LogStock\LogStock;
use App\Core\Domain\Models\Stock\StockType;
use App\Core\Domain\Repository\LogStockRepositoryInterface;

class BuyStockService 
{
    private StockRepositoryInterface $stock_repository;
    private LogStockRepositoryInterface $log_stock_repository;

    public function __construct(StockRepositoryInterface $stock_repository, LogStockRepositoryInterface $log_stock_repository)
    {
        $this->stock_repository = $stock_repository;
        $this->log_stock_repository = $log_stock_repository;
    }

    public function execute(BuyStockRequest $request, UserAccount $account)
    {
        $buy_stock = $this->stock_repository->find(new StockId($request->getStockId()));
        if ($buy_stock->getStatus() == StockStatus::BOUGHT) {
            UserException::throw("Barang ini tidak bisa dibeli", 8000);
        }

        if ($buy_stock->getJumlah() < $request->getJumlah() ) {
            UserException::throw("Jumlah Stock Tidak Cukup", 8000);
        }
        
        $buy_stock->setJumlah($buy_stock->getJumlah() - $request->getJumlah());
        $stock = Stock::create(
            $account->getUserId(),
            $buy_stock->getType(),
            StockStatus::BOUGHT,
            $buy_stock->getName(),
            $request->getJumlah(),
            $buy_stock->getHarga(),
        );
        $this->stock_repository->persist($stock);
        $log_stock = LogStock::create(
            $account->getUserId(),
            $stock->getId(),
            $request->getJumlah()
        );
        $this->log_stock_repository->persist($log_stock);
        
        $this->stock_repository->persist($buy_stock);

        return new BuyStockResponse(
            $stock->getType()->value,
            $stock->getName(),
            $stock->getJumlah(),
            $stock->getHarga()
        );
    }
}