<?php 

namespace App\Core\Application\Service\StockEdit;

use App\Core\Domain\Models\Stock\Stock;
use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Models\Stock\StockId;
use App\Core\Domain\Models\Stock\StockType;
use App\Core\Domain\Models\Stock\StockStatus;
use App\Core\Domain\Repository\StockRepositoryInterface;
use App\Core\Application\Service\StockEdit\StockEditRequest;
use App\Core\Application\Service\StockEdit\StockEditResponse;

class StockEditService 
{
    private StockRepositoryInterface $stock_repository;

    /**
     * @param StockRepositoryInterface $stock_repository
     */
    public function __construct(StockRepositoryInterface $stock_repository)
    {
        $this->stock_repository = $stock_repository;
    }

    public function execute(StockEditRequest $request)
    {
        $stock = $this->stock_repository->find(new StockId($request->getStockId()));
        if ($request->getName()) $stock->setJumlah($request->getJumlah());
        if ($request->getJumlah()) $stock->setName($request->getName());
        if ($request->getHarga()) $stock->setHarga($request->getHarga());
        if ($request->getType()) $stock->setType(StockType::from($request->getType()));

        $this->stock_repository->persist($stock);
    }
}