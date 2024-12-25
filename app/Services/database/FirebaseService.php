<?php

namespace App\Services\Auth;

use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\AuthException;

class FirebaseService implements AuthServiceInterface
{
    protected $firebaseAuth;

    public function __construct(FirebaseAuth $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    public function register(array $data)
    {
        try {
            $user = $this->firebaseAuth->createUserWithEmailAndPassword($data['email'], $data['password']);
            return $user;
        } catch (AuthException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function login(array $credentials)
    {
        try {
            $signInResult = $this->firebaseAuth->signInWithEmailAndPassword($credentials['email'], $credentials['password']);
            return $signInResult->idToken();
        } catch (AuthException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function logout()
    {
        // Firebase does not have a direct logout mechanism; manage token expiry on the frontend.
    }

    public function getUser()
    {
        // Implementation to retrieve user info from Firebase
    }
}
