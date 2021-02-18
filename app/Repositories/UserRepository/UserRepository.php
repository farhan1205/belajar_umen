<?php
namespace app\Repositories\UserRepository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository\iUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;

class UserRepository implements iUserRepository
{
    public function register($request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;

        $confirm = $request->confirm;
        $pass = $request->password;

        if ($confirm == $pass) {
            $plainpassword = $pass;
            $user->password = app('hash')->make($plainpassword) ;
        }

        $user->save();

        return response()->json([
            "user" => $user
        ]);

    }

    public function updateUser($id, $request)
    {
        $data = User::find($id);
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->role = $request->role;

        $pass = $request->password;
        $data->password = app('hash')->make($pass);
        $data->save();

        return $data;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }

    public function logIn($request)
    {
        $user = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($user)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $code = $this->respondWithToken($token);
        return response()->json([
            "message" => "Anda Berhasil Login",
            "Token" => $code
        ]);
    }

    public function logOut()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();
        }
    }


}
