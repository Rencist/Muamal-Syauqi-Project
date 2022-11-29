<?php

namespace App\Http\Controllers;

use App\Core\Application\Service\LoginUser\LoginUserRequest;
use App\Core\Application\Service\LoginUser\LoginUserService;
use App\Core\Application\Service\RegisterUser\RegisterUserRequest;
use App\Core\Application\Service\RegisterUser\RegisterUserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

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
    public function loginUser(Request $request, LoginUserService $service)
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

        //return $json->header('Authorization', 'Bearer '.$data['data']['token']);
        return $json->withCookie('Authorization', 'Bearer ' . $data['data']['token'], 24*60);
        // return redirect('/prediksi');
    }

    public function webCreateUser() {
        return view('auth.register');
    }

    public function webLoginUser(Request $request) {
        if($request->cookie('Authorization'))
            return redirect('/my_stock');
        return view('auth.login');
    }
 
}
