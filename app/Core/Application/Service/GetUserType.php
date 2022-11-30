<?php 

namespace App\Core\Application\Service;

use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Repository\UserRepositoryInterface;

class GetUserType
{
    private UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function execute(UserAccount $account)
    {
        $user_repository = $this->user_repository->find($account->getUserId());
        return $user_repository->getType();
    }
}