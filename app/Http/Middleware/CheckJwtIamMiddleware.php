<?php

namespace App\Http\Middleware;

use App\Core\Domain\Models\UserAccount;
use App\Core\Domain\Service\JwtManagerInterface;
use App\Exceptions\UserException;
use Closure;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckJwtIamMiddleware
{
    private JwtManagerInterface $jwt_manager;
    public UserAccount $account;

    /**
     * @param JwtManagerInterface $jwt_manager
     */
    public function __construct(JwtManagerInterface $jwt_manager)
    {
        $this->jwt_manager = $jwt_manager;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     * @throws Exception
     */

    public function cookiesAuth($auth): string
    {
        $header = $auth;

        $position = strrpos($header, 'Bearer ');

        if ($position !== false) {
            $header = substr($header, $position + 7);

            return str_contains($header, ',') ? strstr($header, ',', true) : $header;
        }

        return "";
    }
    public function handle(Request $request, Closure $next)
    {
        //$jwt = $request->bearerToken();
        $jwt = $this->cookiesAuth($request->cookie('Authorization'));
        if (!$jwt) {
            UserException::throw('Token is not sent', 901);
        }
        $account = $this->jwt_manager->decode($jwt);
        $request->attributes->add(['account' => $account]);

        return $next($request);
    }
}
