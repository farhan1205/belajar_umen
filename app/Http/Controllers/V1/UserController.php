<?php

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\iUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(iUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function regist(Request $request)
    {
        $user = $this->userRepo->register($request);

        return response()->json([
            "message" => "User Created"
        ],201);
    }

    public function update($id,Request $request)
    {
        $user = $this->userRepo->updateUser($id, $request);

        return response()->json([
            "message" => "Data Updated",
            "User" => $user
        ]);
    }

    public function delete($id)
    {
        $user = $this->userRepo->deleteUser($id);

        return response()->json([
            "message" => "Data Deleted"
        ]);
    }

    public function login(Request $request)
    {
        $user = $this->userRepo->logIn($request);

        return response()->json([
            "data" => $user
        ]);
        // $user = $request->only(['email', 'password']);

        // if (!$token = Auth::attempt($user)) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        // $code = $this->respondWithToken($token);
        // return response()->json([
        //     "message" => "Anda Berhasil Login",
        //     "Token" => $code
        // ]);


    }



}
