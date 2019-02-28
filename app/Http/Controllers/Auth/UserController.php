<?php
namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterPost;
use App\Repositories\UserTypeRepository;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const STATUS_200 = 200;
    const STATUS_401 = 401;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $response = [
                'status' => self::STATUS_200,
                'data' => [
                    'token' => $user->createToken('UserToken')->accessToken,
                    'user' => [
                        'name' => $user->name,
                        'lastname' => $user->lastname,
                        'email' => $user->email,
                        'user_type' => $user->user_type->name,
                    ],
                ]
            ];
            return response()->json($response, self::STATUS_200);
        }
        else{
            $response = [
                'status' => self::STATUS_401,
                'message' => 'Unauthorized user',
            ];
            return response()->json($response, 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterPost $request)
    {
        $userTypeRepository = new UserTypeRepository();

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['type_id'] = $userTypeRepository->getClientId();

        $user = User::create($input);

        $response = [
            'status' => self::STATUS_200,
            'data' => [
                'token' => $user->createToken('UserToken')->accessToken,
                'user' => [
                    'name' => $user->name,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'user_type' => $user->user_type->name,
                ],
            ]
        ];
        return response()->json($response, self::STATUS_200);
    }

    public function loginForm()
    {
        return view('Admin.login', []);
    }
}
