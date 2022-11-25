<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exceptions\UserException;
use Illuminate\Http\RedirectResponse;
use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Models\User\UserType;
use App\Core\Domain\Repository\UserRepositoryInterface;

class CheckAdminAccountMiddleware
{
    private UserRepositoryInterface $user_repository;

    /**
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var UserAccount $account */
        $account = $request->get('account');
        if (!$account) {
            UserException::throw("admin account could not be decoded", 2056);
        }
        $user = $this->user_repository->find($account->getUserId());
        $user->beginVerification()->checkUserType(UserType::ADMIN)->verify();
        return $next($request);
    }
}
