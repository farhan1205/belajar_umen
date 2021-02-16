<?php

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use app\Repositories\AuthRepository\iAuthRepository;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected $authRepo;

    public function __construct(iAuthRepository $authRepo)
    {
        $this->$authRepo = $authRepo;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $auth = $this->authRepo->logIn($request);
    }
}
