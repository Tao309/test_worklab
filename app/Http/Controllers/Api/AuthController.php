<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiReponse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiReponse;

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'email' => 'email|required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($data);

        $accessToken = $user->createToken('authToken')->accessToken;

        $result = [
            'user' => $user,
            'access_token' => $accessToken,
        ];

        return $this->sendReponse($result, 'Registered', 200);
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($data))
        {
            return $this->sendError('Invalid Credetials', 404);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        $result = [
            'user' => auth()->user(),
            'access_token' => $accessToken,
        ];

        return $this->sendReponse($result, 'Authorized', 200);
    }
}
