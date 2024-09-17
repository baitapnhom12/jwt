<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        User::create($request->all());
        return response()->json([
            "message" => true
        ], 200);
    }
    public function login(Request $request)
    {
        if ($token = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->responseWithToken($token);
        } else {
            return response()->json([
                'access_token' => "fail error",
            ], 401);
        }
    }

    protected function responseWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::factory()->getTTL(),
        ], 200);
    }
    public function user(Request $request)
    {
        return $request->user();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            "message" => true
        ], 200);
    }
}
