<?php
namespace app\Repositories\AuthRepository;

use app\Repositories\AuthRepository\iAuthRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository\iUserRepository;
use Illuminate\Http\Request;
// use App\Repositories\Auth\IAuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements iAuthRepository
{
    public function AuthUser($request)
    {

    }

    // public function logIn($request)
    // {

    //     $user = $request->only(['email', 'password']);

    //     if (!$token = Auth::attempt($user)) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }
    //     return $token;
    //     return response()->json([
    //         "message" => "Anda Berhasil Login",
    //         "Token" => $token
    //     ]);
    // }
}
