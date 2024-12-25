<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class PassportService implements AuthServiceInterface
{
    public function register(array $data)
    {
        $user = \App\Models\User::create($data);
        return $user;
    }

    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $tokenResult = $user->createToken('API Token');
            $token = $tokenResult->accessToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Invalid credentials'], 404);
    }


    public function logout()
    {
        Auth::logout();
    }

    public function getUser()
    {
        return Auth::user();
    }
}
