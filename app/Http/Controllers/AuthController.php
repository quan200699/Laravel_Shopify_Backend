<?php

namespace App\Http\Controllers;

use App\Role;
use App\Services\UserService;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

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
}
