<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        User::create($request->all());
        return response()->json([
            "status" => true
        ]);
    }
    public function login(Request $request)
    {
        if ($token = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => Auth::factory()->getTTL(),
            ]);
        }
        else{
            return response()->json([
                'access_token' => "fail error",
            ]);
        }
    }
    protected function responseWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::factory()->getTTL(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function user(Request $request)
    {
        return $request->user();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            "status" => true
        ]);
    }
}
