<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        $user = $this->userService->findByEmail($request->only('email'));
        $roles = array();
        foreach ($user->roles as $role) {
            array_push($roles, $role);
        }
        return response()->json([
            'id' => $user->id,
            'accessToken' => $token,
            'email' => $user->email,
            'fullName' => $user->fullName,
            'roles' => $roles
        ], 200);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'AccessToken' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->fullName = $request->fullName;
        $dataUser = $this->userService->create($user);
        $cart = new ShoppingCart();
        $cart->user_id = $dataUser['users']->id;
        $cart->save();
        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }
}
