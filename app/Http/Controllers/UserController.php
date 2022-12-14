<?php

namespace App\Http\Controllers;

use Cookie;
use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\GetUserType;
use App\Core\Domain\Service\JwtManagerInterface;
use App\Core\Application\Service\LoginUser\LoginUserRequest;
use App\Core\Application\Service\LoginUser\LoginUserService;
use App\Core\Application\Service\RegisterUser\RegisterUserRequest;
use App\Core\Application\Service\RegisterUser\RegisterUserService;

class UserController extends Controller
{

    /**
     * @throws Exception
     */
    public function createUser(Request $request, RegisterUserService $service)
    {
        $request->validate([
            'email' => 'unique:user,email|email',
            'password' => 'min:8|max:64|string',
            'name' => 'min:8|max:128|string',
            'no_telp' => 'min:10|max:15|string'
        ]);

        $input = new RegisterUserRequest(
            $request->input('type'),
            $request->input('email'),
            $request->input('usia'),
            $request->input('no_telp'),
            $request->input('name'),
            $request->input('address'),
            $request->input('password')
        );

        DB::beginTransaction();
        try {
            $service->execute($input);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return redirect('/');
    }

    /**
     * @throws Exception
     */
    public function loginUser(Request $request, LoginUserService $service, JwtManagerInterface $jwt_manager, GetUserType $user_service)
    {
        $input = new LoginUserRequest(
            $request->input('email'),
            $request->input('password')
        );
        $response = $service->execute($input);
        $json = response()->json(
            [
                'success' => true,
                'data' => $response,
            ]
        );
        $data = json_decode($json->getContent(), true);
        Cookie::queue('Authorization', 'Bearer ' . $data['data']['token'], 24*60);
        $account = $jwt_manager->decode($data['data']['token']);
        $user_type =  $user_service->execute($account)->value;
        Cookie::queue('userType', $user_type);
        //return $json->withCookie('Authorization', 'Bearer ' . $data['data']['token'], 24*60)
        return redirect('/my_stock');
    }

    public function logoutUser(Request $request) {
        Cookie::queue(Cookie::forget('Authorization'));
        return redirect('/');
    }

    public function webCreateUser(Request $request) {
        if($request->cookie('Authorization'))
            return redirect('/my_stock');
        return view('auth.register');
    }

    public function webLoginUser(Request $request) {
        if($request->cookie('Authorization'))
            return redirect('/my_stock');
        return view('auth.login');
    }
 
}
