<?php 

namespace App\Core\Application\Service\DeleteStock;

use Exception;
use App\Exceptions\UserException;
use Illuminate\Support\Facades\DB;
use App\Core\Domain\Models\User\UserType;
use App\Core\Domain\Repository\StockRepositoryInterface;
use App\Core\Application\Service\DeleteStock\DeleteStockRequest;

class DeleteStockService 
{
    private StockRepositoryInterface $stock_repository;

    /**
     * @param StockRepositoryInterface $stock_repository
     */
    public function __construct(StockRepositoryInterface $stock_repository)
    {
        $this->stock_repository = $stock_repository;
    }

    public function execute(DeleteStockRequest $request, UserType $user_type)
    {
        if ($user_type != UserType::ADMIN)
            UserException::throw ('Anda tidak memiliki izin untuk menghapus', 8000);

        DB::table('stock')->where('id', $request->getStockId())->delete();        
    }
}